<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxcalls extends CI_Controller {

	public function load_products(){
		$catid = $this->input->get('catid');
		$this->db->where('categoryid', $catid);
		$this->db->select("id, caption");
		$query = $this->db->get('products');
		if ($query->num_rows() > 0){
			echo '<option value="">Please select size</option>';
			foreach ($query->result() as $row){
				echo "<option value= ".$row->id.">". $row->caption ."</option>";
			}
		}else{
			echo "<option value= ''>No Products Added Yet</option>";
		}
	}
	public function load_brands(){
		$pid = $this->input->get('pid');
		$this->db->where('productid', $pid);
		$this->db->select("id, caption, pictureurl");
		$query = $this->db->get('brands');
		//echo $query->num_rows();exit;
		if ($query->num_rows() > 0){
			foreach ($query->result() as $row){
				echo '<div class="col-md-6" style="padding-bottom:10px;padding-left:50px;">
						<div class="card border-success">
							<div class="card-body text-success">
								<label for="checkbox_'.$row->id.'" style="cursor:pointer">
									<img class="rounded float-left" width="250px" src="'.base_url("assets/images/brands").'/'.$row->pictureurl.'"><br>
									<input type="checkbox" name="brands[]" id="checkbox_'.$row->id.'" value="'.$row->id.'" onclick="document.getElementById(\'first_next\').disabled = false;">
									<span style="font-size:16px">'.$row->caption.'</span>
								</label>
							</div>
						</div>
					</div>';
			}
		}else{
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					Sorry, no brand has been added to selected product yet.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>';
		}		
	}
}