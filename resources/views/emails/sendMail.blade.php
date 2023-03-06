<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Callat7</title>
<style>
.footer-address a{
	color:#fff;
}
</style>
</head>

<body>
	<table cellpadding="0" cellspacing="0" border="0" width="1000" bgcolor="#f4f4f4" align="center">
		<tr valign="top">
			<td>
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr>
						<td bgcolor="#FFF"></td>
						<td bgcolor="#ffffff" align="center"><img src="https://callat7.com/images/logo.png" alt="Logo" /></td>
						<td bgcolor="#FFF"></td>
					</tr>
                    <tr>
                    	<td bgcolor="#FFF"></td>
                        <td width="600" bgcolor="#ffffff"><hr style="color: #bb1819; border: 1px solid #bb1819;"></td>
                        <td bgcolor="#FFF"></td>
                    </tr>
					<tr>
						<td bgcolor="#FFF"></td>
						<td bgcolor="#ffffff" width="600">
							<table cellpadding="10" cellspacing="10" border="0">
								<tr>
									<td>
                                    	
										{!! $details['decription'] !!}
									</td>
								</tr>
							</table>
						</td>
						<td bgcolor="#FFF"></td>
					</tr>
				</table>
				
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr>
						<td width="200" bgcolor="#FFF" height="20"></td>
						<td width="600" bgcolor="#bb1819" valign="middle" align="center" style="color: #fff; font-size: 10px;">
							<table cellpadding="10" cellspacing="0" border="0" width="100%">
								<tr valign="middle">
									<td class="footer-address" width="100%" align="center" style="color: #fff; font-size: 10px;">
									Copyright Callat7 © <?php echo date('Y');?>. All Rights Reserved</td>
								</tr>
							</table>
						</td>
						<td width="200" bgcolor="#FFF"></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>