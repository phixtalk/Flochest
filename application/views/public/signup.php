<!--
<section class="slice holder-item has-bg-cover bg-size-cover" style="background-image: url(<?=base_url("assets/images/backgrounds/signup_background.jpg")?>); background-position: left center;">
	<span class="mask bg-teal-blue alpha-9"></span>
	<div class="container relative">
		<div class="row cols-xs-space cols-sm-space align-items-center text-xs-left">
			<div class="col-12 col-lg-5 col-md-6">
				<h2 class="heading heading-responsive heading-lg strong-500 c-white animated" data-animation-in="zoomIn" data-animation-delay="200">
					Sign Up
				</h1>
				<p class="strong-300 mt-3 c-white animated" data-animation-in="fadeInUp" data-animation-delay="1000">
					Please follow the very easy steps below to subscribe to Flochest.
				</p>

			</div>

		</div>
	</div>
</section>
-->
		
<link rel="stylesheet" href="<?=base_url("assets/multiform/style.css?v=1.2")?>">		
					
<section class="slice sct-color-1">
	<div class="container">
		<div class="row cols-xs-space cols-sm-space cols-md-space">
			<div class="col-lg-12">
				
				<?php
					
					$attributes = array(
						'name' => 'productForm',
						'class' => 'form-default steps',
						'id' => 'form_validation',
						'data-toggle' => 'validation',
						'novalidate' => '',
						'role'=>'form'
					);
					echo form_open('handlers/handle/register/', $attributes);
					$account = $this->session->flashdata('accountpost');
					
					echo $this->utilities->
							show_notification(
							$this->session->flashdata('flag'),
							$this->session->flashdata('message')
							);
										
				?>
				<!--<form class="steps" accept-charset="UTF-8" enctype="multipart/form-data" novalidate="">-->
				  <ul id="progressbar">
					<li class="active">Choose Products</li>
					<li>Details & Delivery</li>
					<li>Payments</li>
				  </ul>
  
					
					<!--FIRST TAB CHOOSE PRODUCTS-->
					<fieldset>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label><b>Select Type*</b></label>
									<img id="loader1" style='display:none' src='<?=base_url("assets/images/spinner.gif")?>' alt='loading...' />
									<select class="form-control" id="flo_type" data-minimum-results-for-search="Infinity" required>
										<option value="">Please select type</option>
										<?
											$query = $this->db->get('categories');
											foreach ($query->result_array() as $row){
										?>
												<option value="<?=$row['id']?>"><?=$row['caption']?></option>
										<?
											}
										?>
									</select>
								</div>
							</div>
							<div class="col-md-6" style="visibility:hidden" id="flo_size_div">
								<div class="form-group">
									<label><b>Select Size*</b></label><!--selectpicker-->
									<img id="loader2" style='display:none' src='<?=base_url("assets/images/spinner.gif")?>' alt='loading...' />
									<select class="form-control" id="flo_size" data-minimum-results-for-search="Infinity" required>
										<option value="">Please select size</option>
									</select>
								</div>
							</div>
						</div>

					<h5 id="flo_brand_header" style="visibility:hidden">Select a brand*</h5>
					<div class="row-wrapper">
						<div class="row cols-xs-space cols-sm-space cols-md-space" id="flo_brand">
							<div></div>
						</div>
					</div>
					
					<input type="button" data-page="1" name="next" id="first_next" style="display:none" class="next action-button" value="Next" />
					
					</fieldset>
					
					<!--NEXT TAB, DETAILS & DELIVERY-->
					<fieldset>
						<br/><br/>
						<h5 id="flo_brand_header_2"> Please provide your details*</h5>
						
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="firstname">Your Full Names*</label>
								<input type="text" class="form-control form-control-lg" id="firstname" placeholder="First name" name="fullnames" value="<?php echo $account['fullnames'];?>" required>
							</div>

							<div class="col-md-6 mb-3">
								<label for="email">Your Email Address*</label>
								<input type="email" class="form-control form-control-lg" id="email" placeholder="Email Address" name="email" value="<?php echo $account['email'];?>" required>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="phone">Your Phone Number*</label>
								<input type="text" class="form-control form-control-lg" id="phone" placeholder="Phone Number" name="phone" required value="<?php echo $account['phone'];?>">
							</div>

							<div class="col-md-6 mb-3">
								<label for="birthday"> Your Birthday*</label>
								<input type="text" class="form-control form-control-lg datepicker" id="birthday" autocomplete="off" readonly placeholder="Birthday" value="<?php echo $account['birthday'];?>" name="birthday" required>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="pasword">Choose a Password*</label>
								<input type="password" class="form-control form-control-lg" id="pasword" placeholder="Password" name="pasword" required <?php echo $account['pasword'];?>>
							</div>

							<div class="col-md-6 mb-3">
								<label for="confirmpass"> Confirm Password*</label>
								<input type="password" name="confirmpass" class="form-control form-control-lg" id="confirmpass" placeholder="confirm your password" value="<?php echo $account['confirmpass'];?>" required>
							</div>
						</div>

						By Signing up to Flochest, you agree to the <?php echo anchor('#', 'Terms of Service', 'style="text-decoration:underline"', 'title="terms of service"');?> and <?php echo anchor('#', 'Privacy Policy', 'style="text-decoration:underline"', 'title="privacy & cookies"');?>
						
						<br/>
						
						<br/><br/>
						<h5 id="flo_brand_header_3"> Select Subscription & Delivery*</h5>
						
						<div class="row">
							<div class="col-md-12 mb-6">
								<?
									$subid = $account['subscription'];
									if($this->input->get('id')!=""){
										$subid = $this->input->get('id');
									}
								?>
								<label for="subscription"> Select Subscription*</label>
								<select name="subscription" class="form-control" id="flo_type" required>
									<option value="">Please Subscription Option</option>
									<option <?=$subid=="1"?"selected":""?> value="1">Monthly Subscription (&#8358;3,000)</option>
									<option <?=$subid=="2"?"selected":""?> value="2">3 Months Subscription (&#8358;8,000)</option>
									<option <?=$subid=="3"?"selected":""?> value="3">6 Months Subscription (&#8358;15,500)</option>
									<option <?=$subid=="4"?"selected":""?> value="4">12 Months Subscription (&#8358;30,000)</option>
								</select>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="deliverydate"> Delivery Date*</label>
								<input type="text" class="form-control form-control-lg datepicker" id="deliverydate" autocomplete="off" readonly placeholder="Delivery Date" name="deliverydate" required value="<?php echo $account['deliverydate'];?>">
							</div>

							<div class="col-md-6 mb-3">
								<label for="deliveryaddress"> Delivery Address*</label>
								<input type="text" class="form-control form-control-lg" id="deliveryaddress" placeholder="Delivery Address" name="deliveryaddress" value="<?php echo $account['deliveryaddress'];?>" required>
							</div>
						</div>
						
						<br/>
						
						<input type="button" data-page="2" name="previous" class="previous action-button" value="Previous" />
						<input type="submit" data-page="2" name="next" class="next action-button" value="Next" />
	
					</fieldset>
					
					<fieldset>
					
					</fieldset>
  
  
					<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
					<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
					<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js'></script>

					<script  src="<?=base_url("assets/multiform/index.js")?>"></script>
	
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
	$(document).ready(function() {//do this only if form is fully loaded

		$.ajaxSetup ({
			cache: false
		});

		$("#flo_type").change(function(){
			if(this.value!=""){
				$('#loader1').show();
				if(this.value!="3"){//for regular brands
					var loadUrl = "<?=base_url("ajaxcalls/load_products/?catid=")?>"+this.value;
					$.ajax({
						url: loadUrl,
						type: "POST",		
						success: function (html) {
							$('#loader1').hide();
							$('#flo_size_div').css('visibility','visible');
							$("#flo_size").html(html);
							$("#flo_brand").html("");
							$("#first_next").hide();
							$("#first_next").prop("disabled",true);
							
							$('#flo_brand_header').css('visibility','hidden');
						},
						error: function(xhr, textStatus, errorThrown) {
							$('#loader1').hide();
							alert('An error occurred! ' + errorThrown);
						}
					});//end of ajax		
				}else{//for mixed brands
					$('#flo_size_div').css('visibility','hidden');
					var loadUrl = "<?=base_url("ajaxcalls/load_brands/?pid=7")?>";
					$.ajax({
						url: loadUrl,
						type: "POST",		
						success: function (html) {
							$('#loader1').hide();
							$('#flo_brand_header').css('visibility','visible');
							$("#flo_brand").html(html);
							$("#first_next").show();
							$("#first_next").prop("disabled",true);
						},
						error: function(xhr, textStatus, errorThrown) {
							$('#loader1').hide();
							alert('An error occurred! ' + errorThrown);
						}									
					});//end of ajax		
				}
			}else{
				$('#flo_size_div').css('visibility','hidden');
				$("#first_next").hide();
				$("#first_next").prop("disabled",true);
				//disable the button too
				alert("Please select type");
			}
		});//end of onclick function
		
		$("#flo_size").change(function(){
			if(this.value!=""){
				$('#loader2').show();
				var loadUrl = "<?=base_url("ajaxcalls/load_brands/?pid=")?>"+this.value;
				$.ajax({
					url: loadUrl,
					type: "POST",		
					success: function (html) {
						$('#loader2').hide();
						$('#flo_brand_header').css('visibility','visible');
						$("#flo_brand").html(html);
						$("#first_next").show();
						$("#first_next").prop("disabled",true);
					},
					error: function(xhr, textStatus, errorThrown) {
						$('#loader2').hide();
						alert('An error occurred! ' + errorThrown);
					}									
				});//end of ajax		
			}else{
				//$('#flo_size_div').css('visibility','hidden');
				//alert("Please select type");
			}
		});//end of onclick function
		
	});	//end of document ready function
</script>