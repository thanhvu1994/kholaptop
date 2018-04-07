<style type="text/css">
	.color{
		display: inline-block;
		width: 35px;
		height: 15px;
	}
</style>
<div class="breadcrumbs">
  	<ul>
	    <li class="home"><a href="/" title="Quay lại trang chủ">Trang chủ</a> <span>/ </span></li>
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
								        	<input type="hidden" name="Product[option_value]" value="<?php echo $product_option_value_id ?>">
						            		<?php if (strtolower($row['name_option']) == 'color'): ?>
						            			<p><b><?php echo $row['name_option'] ?></b>: <span class="color" style="background-color:<?php echo $row['name_option_value']; ?>"></span> (Giá: <?php echo number_format($row['price']) ?>)</p>
						            		<?php else: ?>
						            			<p><b><?php echo $row['name_option'] ?></b>: <?php echo $row['name_option_value'] ?> (Giá: <?php echo number_format($row['price']) ?>)</p>
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
					            	<b><span class="price-pro" id="price_pro_<?php echo $data['product_id']?>" data-price="<?php echo $arr_price[$key_infos] ?>"><?php echo number_format($arr_price[$key_infos]) ?></span> VND</b></td>
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
	        	<a class="btnBuy" href="/gio-hang?step=2">Thanh toán</a> 
	        	<a class="btnBuy" href="/">Mua tiếp</a> 
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
			$("#cart-detail-"+count+" input[class=qty-hidden]").val($(this).val());
			$.ajax({
	            url: '<?php echo base_url('sites/addCart')?>',
	            type: 'POST',
	            data: $('#cart-detail-'+count).serialize(),
	            success: function (returndata) {
	                if (returndata == 1) {
	                    
	                };
	            }
	        });
		} else {
			alert("Vui lòng nhập số > 0");
			$(this).val(1);
		};
	});
  	
  	function show_cart_total(e,t,n){
  		// unit_price=getItemUnitPrice(e,t),document.getElementById("price_"+e+"_"+t).innerHTML=writeStringToPrice(unit_price*n+""),reCountTotal()
  		var price = getItemUnitPrice(e,t) * n;
  		$("#price_"+e+"_"+t).attr('data-price', price);
  		$("#price_"+e+"_"+t).html(price);
  		var total = 0;
  		$('.price-pro').each(function(k,v) {
  			total += $(this).data('price');
  		});
  		$('#total_value').html(total);
  	}

  	function getItemUnitPrice(e,t){
  		// for(var n=$("#sell_price_"+e+"_"+t).data('price'); n.indexOf(".") > 0;)
  		// 	n=n.replace(".","");
  		// return n=parseInt(n)
  		return $("#sell_price_"+e+"_"+t).data('price');
  	}

  	function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
        	return true;
    	} else {
     		return false;
    	}
	}
    function check_field(){
  		var number_regex1 = /^[0]\d{9}$/i;
  		var number_regex2 = /^[0]\d{10}$/i;
        var error = "";
        var check_name = document.getElementById('buyer_name').value;
        if(check_name.length < 2) error += "- Bạn chưa nhập tên\n";
        var check_email = document.getElementById('buyer_email').value;
        if(check_email.length < 4) {
        //error += "- Bạn chưa nhập email\n";
  		}	
  		if(check_email.length > 4){
        //if(validateEmail(check_email)==false) error += "- Email không hợp lệ\n";
        }
        var check_add = document.getElementById('buyer_address').value;
        if(check_add.length < 10) error += "- Bạn chưa nhập địa chỉ\n";
        var check_tel = document.getElementById('buyer_tel').value;
        if(check_tel.length < 4) error += "- Bạn chưa nhập SĐT\n";
  		else{
  			if(number_regex1.test(check_tel) == false && number_regex2.test(check_tel) == false) error += "- Số điện thoại chưa chính xác\n";
  		}
        if(error != "") {
            alert(error); return false;
        }
        return true;
    }
</script>