<section class="slice-sm sct-color-1">
	<div class="profile">
		<div class="container">
			<div class="row cols-xs-space cols-sm-space cols-md-space">
				
				<?	$this->utilities->get_side_bar("1")?>

				<div class="col-lg-9">
					<div class="main-content">
						<!-- Page title -->
						<div class="page-title">
							<div class="row align-items-center">
								<div class="col-lg-6 col-12">
									<h2 class="heading heading-5 text-capitalize strong-500 mb-0">
										<a href="#" class="link text-underline--none">
											Details & Delivery
										</a>
									</h2>
									<?php
									
										echo $this->utilities->
											show_notification(
											$this->session->flashdata('flag'),
											$this->session->flashdata('message')
											);
									
									?>
								</div>
							</div>
						</div>

						<hr>

						<!-- Notifications -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card no-border bg-transparent">
									<div class="card-title px-0">
										<h3 class="heading heading-6 strong-600">
											Your Details
										</h3>
									</div>
									<div class="card-body px-0">
										<div class="row">
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="control-label"><b style="color:#000">Full Names</b></label>
													<br><?=$this->session->userdata('usernames')?>
												</div>
											</div>
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="control-label"><b style="color:#000">Email</b></label>
													<br><?=$this->session->userdata('email')?>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="control-label"><b style="color:#000">Phone Number</b></label>
													<br><?=$this->session->userdata('phone')?>
												</div>
											</div>
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="control-label"><b style="color:#000">Birthday</b></label>
													<br><?=$this->utilities->system_date($this->session->userdata('birthday'))?>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="control-label"><b style="color:#000">Registered On</b></label>
													<br><?=$this->utilities->system_date($this->session->userdata('createdon'),2)?>
												</div>
											</div>
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="control-label"><b style="color:#000">Profile Last Edited On</b></label>
													<br><?=$this->utilities->system_date($this->session->userdata('modifiedon'),2)?>
												</div>
											</div>
										</div>
										
									</div>
									
									<div class="card-title px-0">
										<h3 class="heading heading-6 strong-600">
											Your Supscription & Delivery
										</h3>
									</div>
									
									<div class="card-body px-0">
										<div class="row">
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="control-label"><b style="color:#000">Subscription</b></label>
													<br><?=$this->utilities->get_subscription($this->session->userdata('subscription'))?>
												</div>
											</div>
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="control-label"><b style="color:#000">Delivery Date</b></label>
													<br><?=$this->utilities->system_date($this->session->userdata('deliverydate'))?>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="control-label"><b style="color:#000">Delivery Address</b></label>
													<br><?=$this->session->userdata('deliveryaddress')?>
												</div>
											</div>
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label class="control-label"><b style="color:#000">Brands</b></label>
													<br>
													<?
														$mybrands = explode(",",$this->session->userdata('brands'));
														$brds="";
														for($e=0; $e < count($mybrands); $e++){
															$brds.=" id= '".$mybrands[$e]."' ".((count($mybrands)-$e)>1?" OR ":"");	
														}
														
														$query = $this->db->query("SELECT * FROM brands WHERE ".$brds);

														if ($query->num_rows() > 0){
															$i=0;
															foreach ($query->result_array() as $row){
																echo $row['caption'].(($query->num_rows()-$i)>1?", ":"");
																$i++;
															}
														} 


													?>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>

							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>