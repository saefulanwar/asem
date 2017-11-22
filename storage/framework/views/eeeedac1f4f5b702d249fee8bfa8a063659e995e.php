<div class="row">
	<div class="col-xs-11">
		<ul class="nav nav-pills nav-justified thumbnail setup-panel">
			<li class="<?php echo e(Request::is('backend/home') ? 'active' : 'disabled'); ?>">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="First Step">1</span> Payment Proof</h4>
			</a>
			</li>
			<li class="<?php echo e(Request::is('backend/home/paymentProof') ? 'active' : 'disabled'); ?>">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="First Step">2</span> Payment Approved</h4>
			</a>
			</li>
			<li class="<?php echo e(Request::is('backend/home/paymentApproved') ? 'active' : 'disabled'); ?>">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="First Step">3</span> My Ticket</h4>
			</a>
			</li>
			<li class="<?php echo e(Request::is('checkout/home/done') ? 'active' : 'disabled'); ?>">
			<a>
			<h4 class="list-group-item-heading">Done</h4>
			</a>
			</li>
		</ul>
	</div>
</div>