(
	function(){
	
		tinymce.create(
			"tinymce.plugins.ThemeShortcodes",
			{
				init: function(d,e) {},
				createControl:function(d,e)
				{
				
					if(d=="theme_shortcodes_button"){
					
						d=e.createMenuButton( "theme_shortcodes_button",{
							title:"Insert Shortcode",
							icons:false
							});
							
							var a=this;d.onRenderMenu.add(function(c,b){
								
  
                                
                                //b.addSeparator();
                                

                                		
                                a.addImmediate(b,"Address", '[address][strong]Twitter, Inc.[/strong][br][/br]795 Folsom Ave, Suite 600[br][/br]San Francisco, CA 94107[br][/br][abbr title="Phone"]P:[/abbr] (123) 456-7890[/address][address][strong]Full Name[/strong][br][/br][hyperlink href="mailto:#"]first.last@gmail.com[/hyperlink][/address]');      
                                
                                a.addImmediate(b,"Break Tag", '[br][/br]');
                                
                           
                                a.addImmediate(b,"Computer Code", '[code]Your content here...[/code]');
                                
                               c=b.addMenu({title:"Divider"});
                                		a.addImmediate(c,"Divider 20px", '[divider20][/divider20]');
                                        a.addImmediate(c,"Divider 10px", '[divider10][/divider10]');
                                        a.addImmediate(c,"Divider 5px", '[divider5][/divider5]');
                                
                                c=b.addMenu({title:"Dropcaps"});
                                		a.addImmediate(c,"Dropcap", '[dropcap]a[/dropcap]');
                                        a.addImmediate(c,"Dropcap 1", '[dropcap1]a[/dropcap1]');
                                        a.addImmediate(c,"Dropcap 2", '[dropcap2]a[/dropcap2]');
                                		a.addImmediate(c,"Dropcap Rounded", '[dropcap type="rounded"]a[/dropcap]');
                                        a.addImmediate(c,"Dropcap 1 Rounded", '[dropcap1 type="rounded"]a[/dropcap1]');
                                        a.addImmediate(c,"Dropcap 2 Rounded", '[dropcap2 type="rounded"]a[/dropcap2]');
                                
                                a.addImmediate(b,"Float Clear", '[clear][/clear]');
                              
                                c=b.addMenu({title:"Headings"});
										a.addImmediate(c,"Headeing h1","[h1]Your content here...[/h1]" );
										a.addImmediate(c,"Headeing h2","[h2]Your content here...[/h2]" );
										a.addImmediate(c,"Headeing h3","[h3]Your content here...[/h3]" );
										a.addImmediate(c,"Headeing h4","[h4]Your content here...[/h4]" );
										a.addImmediate(c,"Headeing h5","[h5]Your content here...[/h5]" );
										a.addImmediate(c,"Headeing h6","[h6]Your content here...[/h6]" );
										
								a.addImmediate(b,"Horizontal Line", '[hr][/hr]');
                                        
                                a.addImmediate(b,"Hyperlink", "[hyperlink target='_self' href='#']Your content here...[/hyperlink]");
                                
                                a.addImmediate(b,"Icon", "[icon]glass[/icon]");
                                
                                c=b.addMenu({title:"Labels"});
                                		a.addImmediate(c,"Default", '[label type="default"]Default[/label]');
                                        a.addImmediate(c,"Success", '[label type="success"]Success[/label]');
                                        a.addImmediate(c,"Info", '[label type="info"]Info[/label]');
                                        a.addImmediate(c,"Warning", '[label type="warning"]Warning[/label]');
                                        a.addImmediate(c,"Danger", '[label type="danger"]Danger[/label]');
                                        
                                c=b.addMenu({title:"List"});
		                                a.addImmediate(c,"Unordered List", '[list icon="glass"]<ul><li>The first list item</li><li>The second list item</li><li>The third list item</li></ul>[/list]');
		                                a.addImmediate(c,"Unordered List (featured)", '[list icon="glass" type="featured"]<ul><li>The first list item</li><li>The second list item</li><li>The third list item</li></ul>[/list]');
                                
                                a.addImmediate(b,"Paragraph", '[p]Your content here...[/p]');
                                
                                c=b.addMenu({title:"Preformatted"});
                                		a.addImmediate(c,"Preformatted Text", '[pre]Your content here...[/pre]');
                                		a.addImmediate(c,"Preformatted Prettyprint", '[prettyprint]Your content here...[/prettyprint]');
                                
                                c=b.addMenu({title:"Tooltip"});
                                		a.addImmediate(c,"Tooltip on top", '[tooltip title="Tooltip on top"]Tooltip on top[/tooltip]');
                                        a.addImmediate(c,"Tooltip on right", '[tooltip title="Tooltip on right" placement="right"]Tooltip on right[/tooltip]');
                                        a.addImmediate(c,"Tooltip on bottom", '[tooltip title="Tooltip on bottom" placement="bottom"]Tooltip on bottom[/tooltip]');
                                        a.addImmediate(c,"Tooltip on left", '[tooltip title="Tooltip on left" placement="left"]Tooltip on left[/tooltip]');
                                        
                                a.addImmediate(b,"Wordking Time", '[working_time title="Business Hours"][time day="Monday :"]8am to 5pm[/time][time day="Tuesday :"]8am to 5pm[/time][time day="Wednesday :"]8am to 5pm[/time][time day="Thursday :"]8am to 5pm[/time][time day="Friday :"]8am to 5pm[/time][time day="Saturday :"]9am to 2pm[/time][time day="Sunday :"]Closed[/time][/working_time]');  
                                
							});
						return d
					
					}
					
					return null
				},
		
				addImmediate:function(d,e,a){d.add({title:e,onclick:function(){tinyMCE.activeEditor.execCommand( "mceInsertContent",false,a)}})}
				
			}
		);
		
		tinymce.PluginManager.add( "ThemeShortcodes", tinymce.plugins.ThemeShortcodes);
	}
)();