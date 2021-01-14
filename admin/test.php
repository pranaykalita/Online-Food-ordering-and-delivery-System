<?php 
                                    if(isset($_REQUEST["additm"]))
									{
										// PICTURE UPLOAD
										$file = $_FILES["itmimg"];
										// $photo_name = $_FILES['itmimg']['name'];
										// $file_type = $_FILES['itmimg']['type'];
										// $file_size =$_FILES['itmimg']['size'];
										// $file_tmp_loc = $_FILES['itmimg']['tmp_name'];
										// $file_store_path = "../images/items/menu/".$photo_name;
										// move_uploaded_file($file_tmp_loc,$file_store_path);
                                        print_r($file);
									}
									?>
									<form action="" method="POST" enctype="multipart/form-data">
										<div class="modal-body">
											<div class="form-group">
												<label for="exampleFormControlFile1">Item Image</label>
												<input type="file" name="itmimg" id="itmimg" class="form-control-file" required>
											</div>
										</div>
										<button type="submit" name ="additm" class="btn btn-primary">Add item</button>
										</div>
									</form>