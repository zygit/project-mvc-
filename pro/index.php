
<?php require("application/view/header.php"); ?>
		
	<!-------content-------------->
	<div class="content" >
	<div  class="left"> <iframe  src="template/index_left_nav.html" ></iframe> </div>
	<div class="right" style="width: 592px" align="center">
		<div class="text">
            <span style="font-size: 24pt; color: #003399; font-family: 黑体">
                <span style="color: #006699">
                    <br />
                    欢迎来到大连工业大学网络学刊&nbsp;</span></span><p>
                        大连工业大学网络学刊隶属于大连工业大学研究生院。</p>
			<p>
				......</p>
				<p>
				......</p>
				
			<p>
                欢迎各位来到大连工业大学网络学刊！</p>
		</div>
		<div class="list">
            <span style="font-size: 24pt; color: #006699; font-family: 黑体">
                <br />
                过刊浏览</span><ul>
				
						
                <li><a href="index.html">
							...... </a></li>
					
						<li><a href="index.html">
							......</a></li>
					
						<li><a href="index.html">
							......</a></li>
					
						<li><a href="index.html">
							......</a></li>
					
			</ul>
			<div class="more">
				<a href="index.html">浏览更多</a>
			</div>
			<div class="clear">
			</div>
		<!---- list ---->
	</div>	
	</div>
	</div>
	<!------ display login layer by jquery ------->
	<div class="blockUI blockOverlay" title="单击关闭"> </div>
	<div class="blockUI blockMsg blockPage" title="单击关闭">
	<div class="loginform">
	<form  action="#" method="post">
		<table  width=100% style="table-layout:fixed;">	
			<tr >
			<td style="width:40px;"></td>
			<td style="width:180px;">
			</td>
			</tr>
		<tr>
		<td colspan=2 >
			<table width=100% >
			<tr height=35px>
			<td> 网络学刊登录</td>
			</tr>
			</table>
		</tr>
		<td>
		<tr height=35px>
			<td   style="width:40px; font-size:13px">用户名：</td>
			<td style="width:180px;">
				<input type="text" value="" name="username" class="inputxt " />
			</td>
		</tr>
		<tr>
			<td style="font-size:13px;">密码：</td>
			<td><input type="password" value="" name="password" class="inputxt " /></td>
		</tr>
		<tr >
			<td   style="font-size:13px;">验证码：</td>
			<td >
			<table width=100%>
			<tr><td style="width:70px;">
				<input  type="text" value="" name="code"  class="inputverify inputxt" />			
			</td>
			<td class="authcodegra">
				<img src="application/common/AuthCode.class.php" alt="看不清楚？" onclick = "this.src='application/common/AuthCode.class.php?'"  />
			</td>
			</table>		
			</td>
		</tr>
	   <tr>
			<td colspan=2 style="padding:4px 50px 4px 80px;">
				<input type="submit" value="登 录" /> &nbsp &nbsp &nbsp
				<a href="#" > 忘记密码 </a>
			</td>
		</tr>
		</table>
	</form>	
	</div>
	</div>
	
<? require("application/view/footer.php");?>
