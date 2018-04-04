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
		            	<td>Số lượng</td>
		            	<td>Tổng</td>
		            	<td>Xóa</td>
		         	 </tr>
		          	<!--0-->
		          	<tr>
		            	<td>1</td>
			            <td class="product_cart"> 
			              	<img src="/media/product/120_3794_24692_laptop_dell_inspiron_15_7567_70138766__i5_7300hq__4gb__1tb__2.jpg" width="50" style="float:left; margin-right:10px;">
			              	<div style="margin-left:60px;">
			              		<a href="http://kholaptop.vn/dell-inspiron-n7567d-i77700-8-128ssd-1tb-nvi-black.html" style="text-decoration:none;"><b>Dell Inspiron N7567D (i77700-8-128SSD-1TB-NVI) Black</b></a>
			              		<div class="product_cart">
			              			<span id="sell_price_pro_3794">30.500.000</span> VND 
		              			</div>
			              	</div>
			            </td>
			            <td>
			              	<input name="quantity_pro_3794" id="quantity_pro_3794" value="1" onchange="updatePrice('pro','3794',this.value)" size="3">
			            </td>
			            <td class="product_cart"><b><span id="price_pro_3794">30.500.000</span> VND</b></td>
			            <td>
			            	<a href="javascript:void(0)" id="subCart">
			            		<img src="/template/default/images/cart_del.png">
			            	</a>
			            </td>
		          	</tr>
		          	<tr>
			            <td colspan="3">
			              	<div class="support_in_cart">
			                	Bạn gặp khó khăn trong việc đặt hàng? Vui lòng nhấc máy để được trợ giúp: &nbsp;&nbsp;<b class="font18 red">024.35379395 - 0985 985 278</b>
			              	</div>
			            </td>
			            <td colspan="2">
			              	<b>Tổng tiền:</b>
			              	<b style="color:red;"><span class="sub1" id="total_value" style="color: red; font-weight: bold;">30.500.000</span> VND</b>  
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

<script type="text/javascript">
	$(document).ready(function() {
		$('#addCart').click(function() {
			var id = 0;
			$.ajax({
                url: '<?php echo base_url('sites/addCart')?>',
                type: 'POST',
                data: {id: id},
                success: function (returndata) {
                    
                }
            });
		});
	});
</script>