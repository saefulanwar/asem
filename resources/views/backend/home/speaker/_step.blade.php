<div class="row">
	<div class="col-xs-11">
		<ul class="nav nav-pills nav-justified thumbnail setup-panel">
			<li class="{{ Request::is('backend/home/speakerPage') ? 'active' : 'disabled' }}">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="First Step">1</span> Upload Abstract</h4>
			</a>
			</li>
			<li class="{{ Request::is('backend/home/abstractApprove') || Request::is('backend/home/speakerPayment')? 'active' : 'disabled' }}">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Second Step">2</span> Payment Proof</h4>
			</a>
			</li>
			<li class="{{ Request::is('backend/home/uploadPaper')  || Request::is('backend/home/uploadPaperForm') ? 'active' : 'disabled' }}">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Third Step">3</span> Upload Paper</h4>
			</a>
			</li>
			<li class="{{ Request::is('backend/home/uploadRevisedPaper') ? 'active' : 'disabled' }}">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Fourth Step">4</span> Paper Revised</h4>
			</a>
			</li>
			<li class="{{ Request::is('backend/home/myTicketSpeaker') ? 'active' : 'disabled'}}">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Fifth Step">5</span> My Ticket</h4>
			</a>
			</li>
			<li class="{{ Request::is('backend/home/finishStep') ? 'active' : 'disabled'}}">
			<a>
			<h4 class="list-group-item-heading"><span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Finish"><i class="fa fa-thumbs-o-up"></i></span> Done</h4>
			</a>
			</li>
		</ul>
	</div>
</div>