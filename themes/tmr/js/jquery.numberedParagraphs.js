/*
jQuery.NumberedParagraphs
	A plugin built for jQuery 1.4
	Intended to create numbered paragraphs ala mandership[www.artlebedev.com/mandership/]
	* inserts id tags on selected elements.
	* scrolls on load if correct id is specified.
Version:
	0.1
	
Author:
	Lee Brunjes
	brunjes-labs.org
	lee.brunjes@gmail.com
	
Options:
	max 	: number of digits to pad out 
	current : number to begin from
	itemroot: class name for paragraphs, id prefix for spans
	padding	: character to pad with
	tag		: tag type to prefix the paragraph with

Usage:
	jQuery("p").numberParagraph();
	jQuery("p").numberParagraph({
		"max": 3,
		"current" : 0,
		"itemroot":"numbered_para",
		"padding":"0",
		"tag":"span"
		});
	
License:
   Copyright 2010 Lee Brunjes

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.

*/
jQuery.fn.extend({"numberParagraph":function(options)
{
	//plugin defualts
	 var  $items = jQuery(this), $currentitem;
     var defaults ={
		"max": ($items.size()+1).toString().length,
		"current" : 0,
		"class":"numbered_para",
		"id_prefix":"numbered_para_",
		"padding":"0",
		"tag":"a"
		};
	//fill in default  option values as needed
	if(options ==null)
	{
		options =defaults;
	}
	else
	{
		//make sure the options we need are set.
		if(options.max ==null)
			options.max = defaults.max;
		if(options.current == null)
			options.current = defaults.current;
		if(options.itemroot == null)
			options.current = defaults.current;
	}
	
    $items.each(function()
    {
        options.current++;
		var padded =_leftPad(options.current);
	
		//add the number to the item
		if(options.tag !="a")
        jQuery(this).prepend(
					jQuery(document.createElement(options.tag))
					.text(padded)
					.attr("id", options.id_prefix+padded)
					.addClass("numbered-item")
				).addClass(options.class);
		else
		{
		 jQuery(this).prepend(
					jQuery(document.createElement(options.tag))
					.text(padded)
					.attr("href","#"+options.id_prefix+padded)
					.attr("id", options.id_prefix+padded)
					.addClass("numbered-item")
				).addClass(options.class);
		}
		
		//scroll to paragraph as the hash tags are not in the dom on load.
		if(window.location.href.indexOf("#"+options.itemroot+padded) > -1)
			jQuery(this).scrollTop();
		
    });
	
	//this left pads our int.
	function _leftPad(input)
    {
        var s = input.toString();
        while(s.length <options.max)
        {
            s =options.padding+ s;
        }
        return s;
    }
}
});

