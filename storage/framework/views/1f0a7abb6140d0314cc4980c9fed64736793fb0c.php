<div class="row">
	<div class="col-xs-11">
		<ul class="nav nav-pills nav-justified thumbnail setup-panel">
			<li class="<?php echo e(Request::is('backend/home/participantPage') ? 'active' : 'disabled'); ?>">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="First Step">1</span> Payment Proof</h4>
			</a>
			</li>
			<li class="<?php echo e(Request::is('backend/home/myTicketParticipant') ? 'active' : 'disabled'); ?>">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Second Step">2</span> My Ticket</h4>
			</a>
			</li>
			<li class="<?php echo e(Request::is('backend/home/finishStep') ? 'active' : 'disabled'); ?>">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Finish"><i class="fa fa-thumbs-o-up"></i></span> Done</h4>
			</a>
			</li>
		</ul>
	</div>
</div>