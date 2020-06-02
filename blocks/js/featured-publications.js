$( document ).ready(function() {
    // Globals
    var searchContainer = $('#aspSearchContainer');
    var searchInput = $('#aspSearchInput');
    var itemContainer = $('#aspSearchItemContainer');
    
    // move search under header
    searchContainer.appendTo( $('#aspMasthead') );

    // remove hide id
    searchContainer.removeClass('hide');

    // add class to first header
    $('.entry-content > *:not(.wp-block-cover):first-child').addClass("asp-after-search");

    // filter to featured on start
    itemContainer.children().filter(
        function(index, element) {
            var categories = $(element).data("categories");
            return categories.includes("Featured");
        }
    ).addClass('show');

    // add handler for search input
    searchInput.on('keyup', $.debounce(500, changeInput));

    //  - on change: filter by search value
    // add debounce of 500ms
    // reset to filter by featured if search is empty


    /*
     * Functions 
     */ 

    // Set all items show value
    // Pass in boolean
    // Pass true to show all items
    // Pass false to hide all items (Default)
    function resetItems(show = false) {
        var classes = ['show', 'priority-1', 'priority-2', 'priority-3', 'priority-4', 'priority-5'];
        if (show) {
            itemContainer.children().addClass('show');
        } else {
            itemContainer.children().removeClass(classes);
        }
    }

    // Listener function for search input
    function changeInput(e) {
        var searchTerm = e.target.value.toLowerCase();
        resetItems();
        if (searchTerm.length < 3) {
            itemContainer.children().filter(
                function(index, element) {
                    var categories = $(element).data("categories").toLowerCase();
                    return categories.includes("featured");
                }
            ).addClass('show');
        } else {
            // split searchTerm into individual strings
            var searchArray = searchTerm.split(" ").filter(word => word.length > 2),
                count = 0;
            itemContainer.children().each((index, element) => {
                var search = getSearchString(element);
                    count = 0; //reset count for each elemnt
                searchArray.forEach(searchTerm => {
                    count += search.includes(searchTerm) ? 1 : 0;
                }); 
                count = (count > 5) ? 5 : count; // max count to 5
                if(count !== 0) {
                    $(element).addClass('show priority-' + count);
                }
            });
        }
    }

    /*
    * Helper Functions
    */
   function getSearchString(element) {
        element = $(element).children('.asp-publication-content');
        var categories = $(element).data("categories"),
            titleExcerpt = $(element).text(),
            search = $(element).data("search");
        search += " " + titleExcerpt + " " + categories;
        return search.toLowerCase();
    }
});


/*
* Helper Functions 
*/ 
$.debounce = function( delay, at_begin, callback ) {
    return callback === undefined
        ? jq_throttle( delay, at_begin, false )
        : jq_throttle( delay, callback, at_begin !== false );
};

$.throttle = jq_throttle = function( delay, no_trailing, callback, debounce_mode ) {
    // After wrapper has stopped being called, this timeout ensures that
    // `callback` is executed at the proper times in `throttle` and `end`
    // debounce modes.
    var timeout_id,
      
      // Keep track of the last time `callback` was executed.
      last_exec = 0;
    
    // `no_trailing` defaults to falsy.
    if ( typeof no_trailing !== 'boolean' ) {
      debounce_mode = callback;
      callback = no_trailing;
      no_trailing = undefined;
    }
    
    // The `wrapper` function encapsulates all of the throttling / debouncing
    // functionality and when executed will limit the rate at which `callback`
    // is executed.
    function wrapper() {
      var that = this,
        elapsed = +new Date() - last_exec,
        args = arguments;
      
      // Execute `callback` and update the `last_exec` timestamp.
      function exec() {
        last_exec = +new Date();
        callback.apply( that, args );
      };
      
      // If `debounce_mode` is true (at_begin) this is used to clear the flag
      // to allow future `callback` executions.
      function clear() {
        timeout_id = undefined;
      };
      
      if ( debounce_mode && !timeout_id ) {
        // Since `wrapper` is being called for the first time and
        // `debounce_mode` is true (at_begin), execute `callback`.
        exec();
      }
      
      // Clear any existing timeout.
      timeout_id && clearTimeout( timeout_id );
      
      if ( debounce_mode === undefined && elapsed > delay ) {
        // In throttle mode, if `delay` time has been exceeded, execute
        // `callback`.
        exec();
        
      } else if ( no_trailing !== true ) {
        // In trailing throttle mode, since `delay` time has not been
        // exceeded, schedule `callback` to execute `delay` ms after most
        // recent execution.
        // 
        // If `debounce_mode` is true (at_begin), schedule `clear` to execute
        // after `delay` ms.
        // 
        // If `debounce_mode` is false (at end), schedule `callback` to
        // execute after `delay` ms.
        timeout_id = setTimeout( debounce_mode ? clear : exec, debounce_mode === undefined ? delay - elapsed : delay );
      }
    };
    
    // Set the guid of `wrapper` function to the same of original callback, so
    // it can be removed in jQuery 1.4+ .unbind or .die by using the original
    // callback as a reference.
    if ( $.guid ) {
      wrapper.guid = callback.guid = callback.guid || $.guid++;
    }
    
    // Return the wrapper function.
    return wrapper;
  };