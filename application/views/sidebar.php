<div class="col-md-3 sidebar section1 "> <!-- starts: section1,sidebar -->
	<div class="row">
		<div class="col-xs-5 col-md-5 profile-img-small">
			<div class="thumbnail">
				<img src="<?php echo base_url('assets/images/owner.jpg'); ?>">
			</div>
		</div>
		<div class="col-xs-7 col-md-7 profile-details-small">
			<div id="owner-name">
				<a href="">Hotel Bidur Subedi</a>
			</div>
			<div id="owner-location">
				Lakeside, Pokhara
			</div>
			<div class="inn-buttons" id="sidebar-buttons">
				<a href="">Profile</a>
				<a href="logout">Logout</a>
			</div>
		</div>
	</div>
	<div class="row" id="sidebar-search">
		<input class="form-control" type="text" placeholder="To search type and hit enter">
	</div>
	<div class="sidebar-menus">
		<ul>
			<li class="current"><a href="home"><i class="fa fa-home"></i>Dashboard</a></li>
			<li><a href=""><i class="fa fa-book"></i>Add bookings</a></li>
			<li><a href="room_setting"><i class="fa fa-building"></i>Room Setting</a></li>
			<li><a href="edit">Profile Edit</a></li>
			<li><a href="">Bookings</a></li>
			<li><a href="">Arrivals</a></li>
			<li><a href="change_password">Change Password</a></li>
		</ul>
	</div>

	<div class="row ">
		<div class="room-filter">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="data-block-filter-head">
					Check Available Rooms
				</div>
			</div>
			<div class="col-md-12 col-sm-4 col-xs-12">
				<select class="form-control">
					<option>Any Category</option>
				</select>
				<div class='clear-small'></div>
			</div>
			<div class="col-md-12 col-sm-4 col-xs-12">
				<input class="form-control" type="text" id="datepicker-from" placeholder="From">
				<div class='clear-small'></div>
			</div>
			<div class="col-md-12 col-sm-4 col-xs-12">
				<input class="form-control" type="text" id="datepicker-to" placeholder="To">
				<div class='clear-small'></div>
			</div>
			<div id="room-filter-button">
				<input class="btn btn-default inn-button room-filter-btn" data-toggle="modal" data-target="#myModal"  type="submit" value="Check">
			</div>

		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        	Available Rooms
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-12"><!-- starts:data-block-big -->
				<div class="data-block" id="available-rooms">
					<div class="data-block-content room-content">
						
						<div class="row room-boxes"> <!-- starts:room row -->
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>
							<div class="col-md-2 col-xs-3 col-sm-2 room-box"  rel="tooltip" title="normal">
								<div class="room-no available ">201</div>
							</div>

						</div><!-- starts:room row -->
					</div>
				</div>
			</div><!-- ends:data-block-big -->
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div><!-- ends: section1,sidebar -->