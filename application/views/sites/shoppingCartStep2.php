<style type="text/css">
	.info-cart{
		text-align: center;
		margin-top: 30px;
	}
	.custom-notify {
		width: 50%;
		margin: 0 auto;
	}
</style>
<div class="breadcrumbs">
	<ul>
		<li class="home"><a href="<?php echo base_url(); ?>" title="Quay lại trang chủ">Trang chủ</a> <span>/ </span></li>
		<li class="category3"><a href="<?php echo base_url('gio-hang.html'); ?>" title="">Giỏ hàng</a><span>/ </span></li>
		<li class="category3">Thanh toán</li>
	</ul>
</div>

<div class="col-main-full">
	<?php if (isset($finish)): ?>
		<div class="title_box_cart custom-notify" style="text-align:center"> 
			Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ liên lạc trong thời gian sớm nhất!
		</div>
		<?php if ($show_card): ?>
			<div class="info-cart">
				<h3><b>Thông tin tài khoản ngân hàng</b></h3>
				<?php echo $this->settings->get_param('info_card'); ?>
			</div>
		<?php endif ?>
	<?php else: ?>
		<div class="page-title category-title"><h1>Giỏ hàng</h1></div>
		<form method="post" enctype="multipart/form-data" action="" id="form-thanh-toan">
			<div class="row">
				<div class="col-md-4">
					<div class="title_box_cart"> Thông tin khách hàng</div>
					<div> Họ tên quý khách <span class="txt2">*</span> <br>
						<input required type="text" name="Orders[customer_name]" id="buyer_name" value="" style="width:100%;">
					</div>
					<div> Địa chỉ Email <span class="txt2">*</span> <br>
						<input required type="text" name="Orders[email]" id="buyer_email" value="" style="width:100%;">
					</div>
					<div> Số điện thoại <span class="txt2">*</span> <br>
						<input required type="text" name="Orders[phone_number]" id="buyer_tel" value="" style="width:100%;">
					</div>
					<div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span> <br>
						<textarea required name="Orders[address]" id="buyer_address" style="height: 50px; width:100%;"></textarea>
					</div>
					<div> Ghi chú <br>
						<textarea name="Orders[note]" id="buyer_note" style="height: 50px; width:100%;"></textarea>
					</div>
					<div> Hình thức thanh toán <br>
						<div class="form-group">
							<input type="radio" name="Orders[type_payment]" value="<?php echo PAYMENT_CASH ?>" checked> Tiền mặt
							<input type="radio" name="Orders[type_payment]" value="<?php echo PAYMENT_CARD ?>"> Chuyển khoản
						</div>
					</div>
				</div><!--col-->
		        <div class="col-md-8">
		        	<div class="title_box_cart"> Xác nhận đơn hàng</div>
		        	<div class="tbl_cart3">
						<table style="border-collapse: collapse;border: 1px solid #ccc;width: 100%;">
				          	<tbody>
				          		<tr bgcolor="#eee" style="color:#333; font-weight:bold; font-size:12px;">
					            	<td>STT</td>
					            	<td>Tên sản phẩm</td>
					            	<td>Thông tin sản phẩm mua thêm</td>
					            	<td>Số lượng</td>
					            	<td>Tổng</td>
					         	 </tr>
					          	<!--0-->
					          	<?php if (isset($_SESSION['shopping_cart']['data'])):
					          		$count = 1;
					          		foreach ($_SESSION['shopping_cart']['data'] as $product_id => $data): 
				          				$rowspan = count($data['info']);
				          				foreach ($data['info'] as $key_infos => $infos) :?>
					          			<tr>
							            	<td><?php echo $count ?></td>
							            	<?php if ($key_infos == 0): ?>
							            		<td class="product_cart" rowspan="<?php echo $rowspan ?>"> 
									              	<img src="<?php echo $data['image'] ?>" width="50" style="float:left; margin-right:10px;">
									              	<div style="margin-left:60px;">
									              		<a href="<?php echo $data['url'] ?>" style="text-decoration:none;"><b><?php echo $data['product_name'] ?></b></a>
									              		<div class="product_cart">
									              			<span id="sell_price_pro_<?php echo $data['product_id']?>" data-price="<?php echo $data['base_price'] ?>"><?php echo number_format($data['base_price']) ?></span> VND 
								              			</div>
									              	</div>
									            </td>
							            	<?php endif ?>
								            <td>
								            	<?php 
								            	$arr_price = [];
							            		$total = 0;
								            	foreach ($infos['data'] as $info):
								            		foreach ($info as $product_option_value_id => $row): 
								            			$total += (int)$row['price'];
								            		?>
										        	<input type="hidden" name="Product[option_value][]" value="<?php echo $product_option_value_id ?>">
								            		<?php if (!empty($row['name_option'])): ?>
								            			<?php if (strtolower($row['name_option']) == 'color'): ?>
									            			<p><b><?php echo $row['name_option'] ?></b>: <span class="color" style="background-color:<?php echo $row['name_option_value']; ?>"></span> (Giá: <?php echo number_format($row['price']) ?>)</p>
									            		<?php else: ?>
									            			<p><b><?php echo $row['name_option'] ?></b>: <?php echo $row['name_option_value'] ?> (Giá: <?php echo number_format($row['price']) ?>)</p>
									            		<?php endif ?>
								            		<?php endif ?>
								            	<?php endforeach;
								            	endforeach; 
						            			$arr_price[$key_infos] = ((int)$total + (int)$data['base_price']) * $infos['quantity']; ?>
								            </td>
								            <td>
								              	<?php echo $infos['quantity'] ?>
								            </td>
								            <td class="product_cart">
								            	<b><span class="price-pro" id="price_pro_<?php echo $count?>" data-price="<?php echo $arr_price[$key_infos] ?>"><?php echo number_format($arr_price[$key_infos]) ?></span> VND</b></td>
							          	</tr>
					          		<?php $count++;
					          			endforeach;
					          		endforeach;
					          	endif ?>
					          	<tr>
					          		<td colspan="4">
						              	<b>Tổng tiền:</b>
					          		</td>
						            <td>
						            	<?php if (isset($_SESSION['shopping_cart']['total_price'])): ?>
							              	<b><span class="sub1" id="total_value" style="font-weight: bold;"><?php echo number_format($_SESSION['shopping_cart']['total_price'])?></span> VND</b>  
						            	<?php endif ?>
						            </td>
					          	</tr>
					        </tbody>
				        </table>
						<div class="tbl_finish" style="padding: 20px 0 0;">
							<table style="width: 100%;">
								<tbody><tr class="line3_fn">
									<td class="txt0 txt_20"><b>Thanh toán</b></td>
									<td class="txt2 txt_20">
										<strong style="color:red; font-size:15px;"> 
											<?php if (isset($_SESSION['shopping_cart']['total_price'])): ?>
								              	<?php echo number_format($_SESSION['shopping_cart']['total_price'])?>
							            	<?php endif ?>
										<u>VND</u>
										</strong>
									</td>
								</tr>
							</tbody></table>
						</div>
						<div class="clear"></div>
						<div style="text-align:right;">
							<input type="submit" class="btnBuy" id="guidonhang" value="Gửi đơn hàng">
						</div>
					</div><!--tbl_cart3-->
				</div><!--col-->
			</div><!--row-->
		</form>
	<?php endif ?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#form-thanh-toan').submit(function() {
			if (validateEmail($('#buyer_email').val()) && validatePhone($('#buyer_tel').val())) {
				return true;
			}
			return false;
		});
	});
	function validateEmail(sEmail) {
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		if (filter.test(sEmail)) {
			$('#buyer_email').css('border-color', 'inherit');
			return true;
		}
		else {
			$('#buyer_email').css('border-color', 'red');
			return false;
		}
	}

	function validatePhone(sPhone) {
		var filter = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
		if (filter.test(sPhone)) {
			$('#buyer_tel').css('border-color', 'inherit');
			return true;
		}
		else {
			$('#buyer_tel').css('border-color', 'red');
			return false;
		}
	}
</script> 