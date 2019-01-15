<style type="text/css">
	header {
		width: 100%;
		height: 50rem;
		background: url(http://vn-test-11.slatic.net/skyline/i8/d10ea94617cc4763b6197b79c83397fb-1360-480.jpg_desktop.jpg) no-repeat;
		background-size: 100%;
	}

	.modal-window {
		position: fixed;
		background-color: rgba(255, 255, 255, 0.25);
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 999;
		opacity: 0;
		pointer-events: none;
		transition: all 0.3s;
	}
	.modal-window:target {
		opacity: 1;
		pointer-events: auto;
	}
	.modal-window > div {
		width: 700px;
		position: absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
		padding: 2em;
		background: #ffffff;
		color: #333333;
	}
	.modal-window header {
		font-weight: bold;
	}
	.modal-window h1 {
		font-size: 150%;
		margin: 0 0 15px;
		color: #333333;
	}

	.modal-close {
		color: #aaa;
		line-height: 50px;
		font-size: 80%;
		position: absolute;
		right: 0;
		text-align: center;
		top: 0;
		width: 70px;
		text-decoration: none;
	}
	.modal-close:hover {
		color: #000;
	}
</style>

<div id="open-modal" class="modal-window">
	<div>
		<a href="#" title="Close" class="modal-close">Close</a>
		<h1>Giỏ hàng</h1>
		<?php
		if(isset($_SESSION["cart_item"])){
			$total_quantity = 0;
			$total_price = 0;
			?>	
			<div>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Tên SP</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Giá</th>
							<th scope="col">Hình ảnh</th>
							<th scope="col">Thao tác</th>
							<th><a id="btnEmpty" class="btn btn-danger" href="giayNam.php?action=empty">Empty Cart</a></th>
						</tr>
					</thead>
					<tbody>
						<?php

						foreach ($_SESSION["cart_item"] as $item){
							$item_price = $item["quantity"]*$item["price"];
							?>


							<tr>
								<th><?php echo $item["prod_name"]; ?></th>
								<th><?php echo $item["quantity"]; ?></th>
								<td><?php echo $item["price"]; ?>.000 VND</td>
								<td><img height="50px" width="50px" src="<?php echo $item["img"]; ?>"></td>
								<td>
									<a href="index.php?action=remove&id=<?php echo $item["id"]; ?>" class="btn btn-warning"> Remove </a>
								</td>
							</tr>
							<?php
							$total_quantity += $item["quantity"];
							$total_price += ($item["price"]*$item["quantity"]);
						}
						?>


						<tr>
							<td colspan="2" align="right">Total:</td>
							<td align="right"><?php echo $total_quantity; ?></td>
							<td align="right" colspan="2"><strong><?php echo "VND ".number_format($total_price, 3); ?></strong></td>
							<td></td>
						</tr>
						<tr>
							<th>
								
									<a href="ViewCart.php" type="button" class="btn btn-danger"> Đặt hàng
									</a>
							</th>
						</tr>
					</tbody>
					
				</table>
				
				<?php
			} else {
				?>
				<div class="no-records">Your Cart is Empty</div>
				<?php 
			}
			?>
		</div>
	</div>
</div>