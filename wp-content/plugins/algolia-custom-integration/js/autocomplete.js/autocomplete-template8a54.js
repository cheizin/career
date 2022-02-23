jQuery(function($) {
  // Disable autocomplete on mobile:
  // Do not load autocomplete initialization.
  if ($(window).width() <= 992) {
    return;
  }

  /* init Algolia client */
  var client = algoliasearch(algolia.application_id, algolia.search_api_key);

  /* setup default sources */
  // runs once for each index (posts and categories)
  var sources = [];
  jQuery.each(algolia.autocomplete.sources, function(i, config) {
    var suggestion_template = wp.template(config["tmpl_suggestion"]);
    sources.push({
      source: algoliaAutocomplete.sources.hits(
        client.initIndex(config["index_name"]),
        {
          hitsPerPage: config["max_suggestions"],
          highlightPreTag: "__ais-highlight__",
          highlightPostTag: "__/ais-highlight__"
        }
      ),
      templates: {
        suggestion: function(hit) {
          for (var key in hit._highlightResult) {
            /* We do not deal with arrays. */
            if (typeof hit._highlightResult[key].value !== "string") {
              continue;
            }

            hit._highlightResult[key].value = _.escape(
              hit._highlightResult[key].value
            );
            hit._highlightResult[key].value = hit._highlightResult[key].value
              .split(/__ais-highlight__/g)
              .join("<em>")
              .split(/__\/ais-highlight__/g)
              .join("</em>");

            hit._highlightResult[key].value = hit._highlightResult[key].value
              .split("&lt;em&gt;")
              .join("<em>")
              .split("&lt;/em&gt;")
              .join("</em>");
          }

          for (var key in hit._snippetResult) {
            /* We do not deal with arrays. */
            if (typeof hit._snippetResult[key].value !== "string") {
              continue;
            }

            hit._snippetResult[key].value = _.escape(
              hit._snippetResult[key].value
            );
            hit._snippetResult[key].value = hit._snippetResult[key].value
              .replace(/__ais-highlight__/g, "<em>")
              .replace(/__\/ais-highlight__/g, "</em>");

            hit._snippetResult[key].value = hit._snippetResult[key].value
              .replace("&lt;em&gt;", "<em>")
              .replace("&lt;/em&gt;", "</em>");
          }

          return suggestion_template(hit);
        }
      }
    });
  });

  /* Setup dropdown menus */
  jQuery("input[name='s']:not('.no-autocomplete')").each(function(i) {
    var $searchInput = jQuery(this);

    var config = {
      debug: algolia.debug,
      hint: false,
      openOnFocus: true,
      appendTo: "body",
      templates: {
        empty: wp.template("autocomplete-empty")
      }
    };

    /* Instantiate autocomplete.js */
    var autocomplete = algoliaAutocomplete($searchInput[0], config, sources).on(
      "autocomplete:selected",
      function(e, suggestion) {
        /* Redirect the user when we detect a suggestion selection. */
        window.location.href = suggestion.permalink;
      }
    );

    /* Force the dropdown to be re-drawn on scroll to handle fixed containers. */
    jQuery(window).scroll(function() {
      if (autocomplete.autocomplete.getWrapper().style.display === "block") {
        autocomplete.autocomplete.close();
        autocomplete.autocomplete.open();
      }
    });
  });
});
