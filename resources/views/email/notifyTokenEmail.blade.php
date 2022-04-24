<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

	<link rel="stylesheet" href="{{asset('frontend')}}/css/style_email.css">
</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
	<center style="width: 100%; background-color: #f1f1f1;">
		<div style="max-width: 600px; margin: 0 auto;" class="email-container">
			<!-- BEGIN BODY -->
		<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
			<tr>
			<td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
				<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td class="logo" style="text-align: center;">
							<h1>
								<a href="{{route('home.index')}}">Thực Phẩm Xanh</a>
							</h1>
						</td>
					</tr>
				</table>
			</td>
			</tr><!-- end tr -->
			<tr>
			<td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">
				<img src="images/email.png" alt="" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
			</td>
			</tr><!-- end tr -->
					<tr>
			<td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
				<table>
					<tr>
						<td>
							<div class="text" style="padding: 0 2.5em; text-align: center;">
								<h2>Vui lòng xác thực email của bạn</h2>
								<h3>Ưu đãi tuyệt vời, cập nhật, tin tức thú vị ngay trong hộp thư đến của bạn</h3>
								<a href="{{route('verify-email-token', ['token' => $token, 'id' => $userId])}}" style="padding: 10px 20px;background-color: green;border-radius: 5px;color: #fff;" class="btn btn-primary">Xác thực email</a> 
							</div>
						</td>
					</tr>
				</table>
			</td>
			</tr><!-- end tr -->
		<!-- 1 Column Text + Button : END -->
		</table>
		</div>
  </center>
</body>
</html>