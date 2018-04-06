<div class="breadcrumbs">
  	<ul>
	    <li class="home"><a href="/" title="Quay lại trang chủ">Trang chủ</a> <span>/ </span></li>
	    <li class="category3"><a href="" title="">Giỏ hàng</a></li>
  	</ul>
</div>

<div class="col-main-full">
  	<div class="page-title category-title"><h1>Giỏ hàng</h1></div>
		<form method="post" enctype="multipart/form-data" action="/gui-don-hang" onsubmit="return check_field()">
	        <!--Buoc 1 : gio hang-->
	        <span style="display: none;"></span>
	        <span style="display: none;"></span>
	        <table cellpadding="5" border="1" bordercolor="#CCCCCC" class="table-shopping-cart">
	          	<tbody>
	          		<tr bgcolor="#eee" style="color:#333; font-weight:bold; font-size:12px;">
		            	<td>STT</td>
		            	<td>Tên sản phẩm</td>
		            	<td>Thông tin sản phẩm</td>
		            	<td>Số lượng</td>
		            	<td>Tổng</td>
		            	<td>Xóa</td>
		         	 </tr>
		          	<!--0-->
		          	<?php if (isset($_SESSION['shopping_cart']['data'])):
		          		foreach ($_SESSION['shopping_cart']['data'] as $key => $data): ?>
		          			<tr>
				            	<td><?php echo $key + 1 ?></td>
					            <td class="product_cart"> 
					              	<img src="<?php echo $data['image'] ?>" width="50" style="float:left; margin-right:10px;">
					              	<div style="margin-left:60px;">
					              		<a href="<?php echo $data['url'] ?>" style="text-decoration:none;"><b><?php echo $data['product_name'] ?></b></a>
					              		<div class="product_cart">
					              			<span id="sell_price_pro_<?php echo $data['product_id']?>"><?php echo number_format($data['price']) ?></span> VND 
				              			</div>
					              	</div>
					            </td>
					            <td></td>
					            <td>
					              	<input name="quantity_pro_<?php echo $data['product_id']?>" id="quantity_pro_<?php echo $data['product_id']?>" value="1" onchange="updatePrice('pro',<?php echo $data['product_id']?>,this.value)" size="3">
					            </td>
					            <td class="product_cart"><b><span id="price_pro_<?php echo $data['product_id']?>"><?php echo number_format($data['price']) ?></span> VND</b></td>
					            <td>
					            	<a href="javascript:void(0)" id="subCart">
					            		<img src="<?php echo base_url('themes/website/images/cart_del.png') ?>">
					            	</a>
					            </td>
				          	</tr>
		          		<?php endforeach;
		          	endif ?>
		          	<tr>
			            <td colspan="3">
			              	<div class="support_in_cart">
			                	Bạn gặp khó khăn trong việc đặt hàng? Vui lòng nhấc máy để được trợ giúp: &nbsp;&nbsp;<b class="font18 red"><?php echo $this->settings->get_param('companyPhone'); ?> - <?php echo $this->settings->get_param('companyCellPhone'); ?></b>
			              	</div>
			            </td>
			            <td colspan="2">
			              	<b>Tổng tiền:</b>
			              	<b style="color:red;"><span class="sub1" id="total_value" style="color: red; font-weight: bold;"><?php echo number_format($_SESSION['shopping_cart']['total_price'])?></span> VND</b>  
			            </td>
		          	</tr>
		        </tbody>
	        </table>
	        <div class="clear space2"></div>
	        <div align="right"> 
	        	<a class="btnBuy" href="/gio-hang?step=2">Thanh toán</a> 
	        	<a class="btnBuy" href="/">Mua tiếp</a> 
	        </div>
      	</form>
    </div>
<script type="text/javascript">
	function updatePrice(e,t,n){
		check_interger(n)||(alert("Vui lòng nhập số > 0"),n=1,$("#quantity_"+e+"_"+t).val(n)),show_cart_total(e,t,n);

		var r=$("#discount_code").val();
		if(r.length>0){
			for(var o=document.getElementById("total_value").innerHTML; o.indexOf(".")>0;)
				o=o.replace(".","");
			check_discount("coupon",r,parseInt(o))
		}
	}
  	
  	function show_cart_total(e,t,n){
  		unit_price=getItemUnitPrice(e,t),document.getElementById("price_"+e+"_"+t).innerHTML=writeStringToPrice(unit_price*n+""),reCountTotal()
  	}

  	function getItemUnitPrice(e,t){
  		for(var n=document.getElementById("sell_price_"+e+"_"+t).innerHTML;n.indexOf(".")>0;)
  			n=n.replace(".","");
  		return n=parseInt(n)
  	}

  	function validateEmail(sEmail) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(sEmail)) {
            	return true;
            	}
            	else {
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