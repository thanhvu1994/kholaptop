<style type="text/css">
	.color{
		display: inline-block;
		width: 35px;
		height: 15px;
	}
</style>
<div class="breadcrumbs">
  	<ul>
	    <li class="home"><a href="<?php echo base_url(); ?>" title="Quay lại trang chủ">Trang chủ</a> <span>/ </span></li>
	    <li class="category3"><a href="" title="">Giỏ hàng</a></li>
  	</ul>
</div>

<div class="col-main-full">
  	<div class="page-title category-title"><h1>Giỏ hàng</h1></div>
	        <!--Buoc 1 : gio hang-->
	        <span style="display: none;"></span>
	        <span style="display: none;"></span>
	        <table cellpadding="5" border="1" bordercolor="#CCCCCC" class="table-shopping-cart">
	          	<tbody>
	          		<tr bgcolor="#eee" style="color:#333; font-weight:bold; font-size:12px;">
		            	<td>STT</td>
		            	<td>Tên sản phẩm</td>
		            	<td>Thông tin sản phẩm mua thêm</td>
		            	<td>Số lượng</td>
		            	<td>Tổng</td>
		            	<td>Xóa</td>
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
				            		<form id="cart-detail-<?php echo $count?>">
								        <input type="hidden" name="Product[product_id]" value="<?php echo $data['product_id']; ?>">
								        <input type="hidden" name="Product[base_price]" value="<?php echo $data['base_price']; ?>">
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
								        <input type="hidden" class="qty-hidden" name="Product[quantity]" value="<?php echo $infos['quantity']; ?>">
				          			</form>
					            </td>
					            <td>
					              	<input class="change-qty" data-up="<?php echo $count?>" id="quantity_pro_<?php echo $data['product_id']?>" value="<?php echo $infos['quantity'] ?>" size="3">
					            </td>
					            <td class="product_cart">
					            	<b><span class="price-pro" id="price_pro_<?php echo $count?>" data-price="<?php echo $arr_price[$key_infos] ?>"><?php echo number_format($arr_price[$key_infos]) ?></span> VND</b></td>
					            <td>
					            	<a href="javascript:void(0)" class="subCart" data-del="<?php echo $count?>">
					            		<img src="<?php echo base_url('themes/website/images/cart_del.png') ?>">
					            	</a>
					            </td>
				          	</tr>
		          		<?php $count++;
		          			endforeach;
		          		endforeach;
		          	endif ?>
		          	<tr>
			            <td colspan="3">
			              	<div class="support_in_cart">
			                	Bạn gặp khó khăn trong việc đặt hàng? Vui lòng nhấc máy để được trợ giúp: &nbsp;&nbsp;<b class="font18 red"><?php echo $this->settings->get_param('companyPhone'); ?> - <?php echo $this->settings->get_param('companyCellPhone'); ?></b>
			              	</div>
			            </td>
			            <td colspan="2">
			            	<?php if (isset($_SESSION['shopping_cart']['total_price'])): ?>
				              	<b>Tổng tiền:</b>
				              	<b style="color:red;"><span class="sub1" id="total_value" style="color: red; font-weight: bold;"><?php echo number_format($_SESSION['shopping_cart']['total_price'])?></span> VND</b>  
			            	<?php endif ?>
			            </td>
		          	</tr>
		        </tbody>
	        </table>

	        <div class="clear space2"></div>
	        <div align="right"> 
	        	<a class="btnBuy" href="<?php echo base_url('gio-hang/thanh-toan.html') ?>">Thanh toán</a> 
	        	<a class="btnBuy" href="<?php echo base_url() ?>">Mua tiếp</a> 
	        </div>
    </div>
<script type="text/javascript">
	function checkInt(n) {
		if(Math.floor(n) == n && $.isNumeric(n)) {
			return true;
		}
		return false;
	}

	$('.change-qty').change(function() {
		if (checkInt($(this).val())) {
			var count = $(this).data('up');
			var price = $('#price_pro_'+count).data('price') * $(this).val();
			price = price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			
			$("#cart-detail-"+count+" input[class=qty-hidden]").val($(this).val());
			$.ajax({
	            url: '<?php echo base_url('sites/updateCart')?>',
	            type: 'POST',
	            data: $('#cart-detail-'+count).serialize(),
	            success: function (returndata) {
	            	$('#total_value').html(returndata);
	            	$('#price_pro_'+count).html(price);
	            }
	        });
		} else {
			alert("Vui lòng nhập số > 0");
			$(this).val(1);
		};
	});


	$('.subCart').click(function() {
		if (confirm('Bạn có chắc muốn xóa sản phẩm này?')) {
			var count = $(this).data('del');
			$.ajax({
	            url: '<?php echo base_url('sites/subCart')?>',
	            type: 'POST',
	            data: $('#cart-detail-'+count).serialize(),
	            success: function (returndata) {
	            	location.reload();
	            }
	        });
		}
	});
</script>