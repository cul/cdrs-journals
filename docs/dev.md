#Developer Docs

##Hacks

###Search

Search hack to get the search everything plugin working on the article pages

```
jQuery("#sub").on("click", function(){
  event.preventDefault();
  var url = "http://" + window.location.host + "/?s=";
  var new_url = url.concat(jQuery("#s").val());
//   jQuery.load(new_url);
  window.location.href = new_url;
});

```

In the js file we also removed some of the out of the box styling that came with the plugin so we could bootstrap the search.

Additionally the "no results found" message is not standard for the plugin, so that was added via the js file as well.

##Tips/How to Use

##Setting Up the Homepage Search

In order to get the search bar on the homepage aka current articles screen, you must go to the backend menu, Appearance->widgets and then look at the "Article Search" widget. Drag "Search" into that area, and the search bar will now be on the home page.

##Permalinks

After you endable the theme, you need to click on permalinks to refresh or else you'll get a 404

##Plugins

Plugins common to all new installations:
* Custom Journal Settings (Developed in house)
* Easy Fancybox
* Search Everything
* FD Footnotes

