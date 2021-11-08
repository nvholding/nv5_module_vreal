<!-- BEGIN: main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>{page_title} - Printing</title>
		<meta http-equiv="Content-Language" content="vi" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<style type="text/css">
			body {
				font-family: Arial, Helvetica, sans-serif;
				font-size: 12px;
			}

			.clear {
				clear: both;
			}

			#header {
				height: 100%;
				line-height: 40px;
				border-bottom: 2px solid #20bc5a;
				margin-bottom: 10px;
			}

			#header h2 {
				float: left;
				display: inline;
				padding: 0;
				margin: 0;
			}

			#header p {
				float: right;
				display: inline;
				padding: 0;
				margin: 0;
			}

			#footer {
				margin-top: 10px;
				border-top: 2px solid #20bc5a;
			}

			#footer #url {
				line-height: 25px;
				font-size: 100%;
				display: block;
				border-bottom: 2px solid #4D5764;
				height:25px;
				white-space:nowrap;
				text-overflow:ellipsis;
				width:100%;
				overflow:hidden;
			}

			#footer .copyright {
				float: left;
				display: inline;
				padding: 5px 0;
			}

			#footer #contact {
				float: right;
				display: inline;
				padding: 5px 0;
			}

			#footer #contact a:hover {
				text-decoration: none;
				cursor: pointer;
			}

			.control {
				padding: 0;
				margin: 0
			}

			.control li {
				list-style: none;
				float: left;
				margin-right: 5px;
			}

			a {
				text-decoration: none;
				color: #0080c0;
			}
			.price{color:#06f}
			.content {line-height:20px;font-size:13px;}
			.content p {margin:5px 0; text-align:justify;}
		</style>
		<div id="detail">
			<div id="header">
				<h2>{site_name}</h2>
				<p>
					<a title="{site_name}" href="{url}">{url}</a>
				</p>
				<div class="clear"></div>
			</div>
			<ul class="control">
				<li>
					<a title="{LANG.print}" href="javascript:;" onclick="window.print()">{LANG.print_page}</a>
				</li>
				<li>
					| <a title="{LANG.print_close}" href="javascript:;" onclick="window.close()">{LANG.print_close}</a>
				</li>
			</ul>
			<div class="clear"></div>
			<div class="content" style="padding-top:10px">
				<img style="width:50%;float: left;padding:5px 10px 0 0" src="{SRC_PRO}" alt="{TITLE}" width="100%" align="center">
					<span style="font-size:15px"><strong>{TITLE}</strong></span>
					<p style="color:#555"><i>{DATE_UP}- {LANG.detail_num_view}: {NUM_VIEW}</i></p>
					<p>{LANG.detail_pro_price}:			
					<!-- BEGIN: price --><strong class="price">{product_price} {pro_unit}</strong><!-- END: price -->
					<!-- BEGIN: contact --><strong class="price">{LANG.price_contact}</strong><!-- END: contact -->			
					</p>
					
					{DETAIL}
				</div>
			</div>
			<div class="clear"></div>
			<div id="footer">
				<div id="url">
					<strong>{LANG.print_link}: </strong>{link_url}
				</div>
				<div class="clear"></div>
				<div class="copyright">
					&copy; {site_name}
				</div>
				<div id="contact">
					<a href="mailto:{CONTENT.contact}">{contact}</a>
				</div>
			</div>
		</div>
	</body>
</html>
<!-- END: main -->