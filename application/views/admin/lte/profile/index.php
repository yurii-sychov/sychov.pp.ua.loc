<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">

			<!-- Profile Image -->
			<div class="card card-primary card-outline">
				<div class="card-body box-profile">
					<div class="text-center">
						<img class="profile-user-img img-fluid img-circle"
						src="<?php echo (isset($user->image) AND $user->image !== '') ? '/assets/admin/uploads/users/'.$user->image : '/assets/admin/themes/'.$this->config->item('theme_admin').'/dist/img/user2-160x160.jpg' ?>"
						alt="User profile picture">
					</div>

					<h3 class="profile-username text-center"><?php echo $user->name. ' ' .$user->surname; ?></h3>

					<p class="text-muted text-center"><?php echo $user->profession; ?></p>

					<ul class="list-group list-group-unbordered mb-3">
						<li class="list-group-item">
							<b>Followers</b> <a class="float-right">1,322</a>
						</li>
						<li class="list-group-item">
							<b>Following</b> <a class="float-right">543</a>
						</li>
						<li class="list-group-item">
							<b>Friends</b> <a class="float-right">13,287</a>
						</li>
					</ul>

					<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->

			<!-- About Me Box -->
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">About Me</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<strong><i class="fas fa-book mr-1"></i> Education</strong>

					<p class="text-muted" id="aboutEducation">
						<?php echo $user->education; ?>
					</p>

					<hr>

					<strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

					<p class="text-muted" id="aboutLocation"><?php echo $user->country_id.', '.$user->city_id.'<br/>'.$user->address.'<br/>'.$user->post; ?></p>

					<hr>

					<strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

					<p class="text-muted">
						<?php foreach ($skills as $skill): ?>
							<span class="tag tag-danger"><?php echo $skill; ?></span>
						<?php endforeach; ?>
					</p>

					<hr>

					<strong><i class="far fa-file-alt mr-1"></i> About</strong>

					<p class="text-muted"><?php echo $user->about; ?></p>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->

		</div>
		<!-- /.col -->
		
		<div class="col-md-9">
			<div class="card">
				<div class="card-header p-2">
					<ul class="nav nav-pills">
						<!-- <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li> -->
						<!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
						<li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
						<li class="nav-item"><a class="nav-link" href="#changePassword" data-toggle="tab">Change Password</a></li>
					</ul>
				</div><!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane" id="activity">
							<!-- Post -->
							<div class="post">
								<div class="user-block">
									<img class="img-circle img-bordered-sm" src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/user1-128x128.jpg" alt="user image">
									<span class="username">
										<a href="#">Jonathan Burke Jr.</a>
										<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
									</span>
									<span class="description">Shared publicly - 7:30 PM today</span>
								</div>
								<!-- /.user-block -->
								<p>
									Lorem ipsum represents a long-held tradition for designers,
									typographers and the like. Some people hate it and argue for
									its demise, but others ignore the hate as they create awesome
									tools to help create filler text for everyone from bacon lovers
									to Charlie Sheen fans.
								</p>

								<p>
									<a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
									<a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
									<span class="float-right">
										<a href="#" class="link-black text-sm">
											<i class="far fa-comments mr-1"></i> Comments (5)
										</a>
									</span>
								</p>

								<input class="form-control form-control-sm" type="text" placeholder="Type a comment">
							</div>
							<!-- /.post -->

							<!-- Post -->
							<div class="post clearfix">
								<div class="user-block">
									<img class="img-circle img-bordered-sm" src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/user7-128x128.jpg" alt="User Image">
									<span class="username">
										<a href="#">Sarah Ross</a>
										<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
									</span>
									<span class="description">Sent you a message - 3 days ago</span>
								</div>
								<!-- /.user-block -->
								<p>
									Lorem ipsum represents a long-held tradition for designers,
									typographers and the like. Some people hate it and argue for
									its demise, but others ignore the hate as they create awesome
									tools to help create filler text for everyone from bacon lovers
									to Charlie Sheen fans.
								</p>

								<form class="form-horizontal">
									<div class="input-group input-group-sm mb-0">
										<input class="form-control form-control-sm" placeholder="Response">
										<div class="input-group-append">
											<button type="submit" class="btn btn-danger">Send</button>
										</div>
									</div>
								</form>
							</div>
							<!-- /.post -->

							<!-- Post -->
							<div class="post">
								<div class="user-block">
									<img class="img-circle img-bordered-sm" src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/user6-128x128.jpg" alt="User Image">
									<span class="username">
										<a href="#">Adam Jones</a>
										<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
									</span>
									<span class="description">Posted 5 photos - 5 days ago</span>
								</div>
								<!-- /.user-block -->
								<div class="row mb-3">
									<div class="col-sm-6">
										<img class="img-fluid" src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>/dist/img/photo1.png" alt="Photo">
									</div>
									<!-- /.col -->
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-6">
												<img class="img-fluid mb-3" src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/photo2.png" alt="Photo">
												<img class="img-fluid" src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/photo3.jpg" alt="Photo">
											</div>
											<!-- /.col -->
											<div class="col-sm-6">
												<img class="img-fluid mb-3" src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/photo4.jpg" alt="Photo">
												<img class="img-fluid" src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/photo1.png" alt="Photo">
											</div>
											<!-- /.col -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row -->

								<p>
									<a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
									<a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
									<span class="float-right">
										<a href="#" class="link-black text-sm">
											<i class="far fa-comments mr-1"></i> Comments (5)
										</a>
									</span>
								</p>

								<input class="form-control form-control-sm" type="text" placeholder="Type a comment">
							</div>
							<!-- /.post -->
						</div>
						<!-- /.tab-pane -->

						<div class="tab-pane" id="timeline">
							<!-- The timeline -->
							<ul class="timeline timeline-inverse">
								<!-- timeline time label -->
								<li class="time-label">
									<span class="bg-danger">
										10 Feb. 2014
									</span>
								</li>
								<!-- /.timeline-label -->
								<!-- timeline item -->
								<li>
									<i class="fas fa-envelope bg-primary"></i>

									<div class="timeline-item">
										<span class="time"><i class="far fa-clock"></i> 12:05</span>

										<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

										<div class="timeline-body">
											Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
											weebly ning heekya handango imeem plugg dopplr jibjab, movity
											jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
											quora plaxo ideeli hulu weebly balihoo...
										</div>
										<div class="timeline-footer">
											<a href="#" class="btn btn-primary btn-sm">Read more</a>
											<a href="#" class="btn btn-danger btn-sm">Delete</a>
										</div>
									</div>
								</li>
								<!-- END timeline item -->
								<!-- timeline item -->
								<li>
									<i class="fas fa-user bg-info"></i>

									<div class="timeline-item">
										<span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

										<h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
										</h3>
									</div>
								</li>
								<!-- END timeline item -->
								<!-- timeline item -->
								<li>
									<i class="fas fa-comments bg-warning"></i>

									<div class="timeline-item">
										<span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

										<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

										<div class="timeline-body">
											Take me to your leader!
											Switzerland is small and neutral!
											We are more like Germany, ambitious and misunderstood!
										</div>
										<div class="timeline-footer">
											<a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
										</div>
									</div>
								</li>
								<!-- END timeline item -->
								<!-- timeline time label -->
								<li class="time-label">
									<span class="bg-success">
										3 Jan. 2014
									</span>
								</li>
								<!-- /.timeline-label -->
								<!-- timeline item -->
								<li>
									<i class="fas fa-camera bg-purple"></i>

									<div class="timeline-item">
										<span class="time"><i class="far fa-clock"></i> 2 days ago</span>

										<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

										<div class="timeline-body">
											<img src="https://placehold.it/150x100" alt="..." class="margin">
											<img src="https://placehold.it/150x100" alt="..." class="margin">
											<img src="https://placehold.it/150x100" alt="..." class="margin">
											<img src="https://placehold.it/150x100" alt="..." class="margin">
										</div>
									</div>
								</li>
								<!-- END timeline item -->
								<li>
									<i class="far fa-clock bg-gray"></i>
								</li>
							</ul>
						</div>
						<!-- /.tab-pane -->

						<div class="tab-pane active" id="settings">
							<form class="form-horizontal" action="">
								<input type="hidden" id="InputId" value="<?php echo $user->id; ?>">
								<div class="form-group">
									<label for="InputSurname" class="col-sm-2 control-label">Surname</label>

									<div class="col-sm-12">
										<input type="text" class="form-control" id="InputSurname" placeholder="Enter Surname" value="<?php echo $user->surname; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="InputName" class="col-sm-2 control-label">Name</label>

									<div class="col-sm-12">
										<input type="text" class="form-control" id="InputName" placeholder="Enter Name" value="<?php echo $user->name; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="InputPatronymic" class="col-sm-2 control-label">Patronymic</label>

									<div class="col-sm-12">
										<input type="text" class="form-control" id="InputPatronymic" placeholder="Enter Patronymic" value="<?php echo $user->patronymic; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="InputEmail" class="col-sm-2 control-label">Email</label>

									<div class="col-sm-12">
										<input type="email" class="form-control" id="InputEmail" placeholder="Enter Email" value="<?php echo $user->email; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="SelectCountry" class="col-sm-2 control-label">Country</label>

									<div class="col-sm-12">
										<select class="form-control select2" id="SelectCountry" style="width: 100%;">
											<option value="">Select Country</option>
											<?php foreach ($countries as $country): ?>
												<option value="<?php echo $country->id; ?>" <?php echo $country->id === $user->country_id ? 'selected' : null; ?>><?php echo $country->name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="SelectRegion" class="col-sm-2 control-label">Region</label>

									<div class="col-sm-12">
										<select class="form-control select2" id="SelectRegion" style="width: 100%;" disabled="disabled">
											<option value="">Select Region</option>
											<?php foreach ($regions as $region): ?>
												<option value="<?php echo $region->id; ?>" <?php echo $region->id === $user->region_id ? 'selected' : null; ?>><?php echo $region->name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="SelectCity" class="col-sm-2 control-label">City</label>

									<div class="col-sm-12">
										<select class="form-control select2" id="SelectCity" style="width: 100%;" disabled="disabled">
											<option value="">Select City</option>
											<?php foreach ($cities as $city): ?>
												<option value="<?php echo $city->id; ?>" <?php echo $city->id === $user->city_id ? 'selected' : null; ?>><?php echo $city->name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="InputAddress" class="col-sm-2 control-label">Address</label>

									<div class="col-sm-12">
										<input type="text" class="form-control" id="InputAddress" placeholder="Enter Address" value="<?php echo $user->address; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="InputPost" class="col-sm-2 control-label">Post</label>

									<div class="col-sm-12">
										<input type="text" class="form-control" id="InputPost" placeholder="Enter Post" value="<?php echo $user->post; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="InputEducation" class="col-sm-2 control-label">Education</label>

									<div class="col-sm-12">
										<input type="text" class="form-control" id="InputEducation" placeholder="Enter Education" value="<?php echo $user->education; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="InputProfession" class="col-sm-2 control-label">Profession</label>

									<div class="col-sm-12">
										<input type="text" class="form-control" id="InputProfession" placeholder="Enter Profession" value="<?php echo $user->profession; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="InputAbout" class="col-sm-2 control-label">About</label>

									<div class="col-sm-12">
										<textarea class="form-control" id="InputAbout" placeholder="Enter About"><?php echo $user->about; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="InputSkills" class="col-sm-2 control-label">Skills</label>

									<div class="col-sm-12">
										<input type="text" class="form-control" id="InputSkills" placeholder="Enter Skills" value="<?php echo $user->skills; ?>">
									</div>
								</div>
								<!-- <div class="form-group">
									<div class="col-sm-12">
										<div class="icheck-primary d-inline">
											<input type="checkbox" id="CheckboxStatus" name="status">
											<label for="CheckboxStatus">Make active</label>
										</div>
									</div>
								</div> -->
								<div class="form-group">
									<div class="col-sm-12">
										<div class="icheck-primary d-inline">
											<input type="radio" name="gender" value="1" id="RadioMale" <?php echo $user->gender == 1 ? 'checked' : null; ?>>
											<label for="RadioMale">Male</label>
										</div>
										<div class="icheck-primary d-inline">
											<input type="radio" name="gender" value="0" id="RadioFemale" <?php echo $user->gender == 0 ? 'checked' : null; ?>>
											<label for="RadioFemale">Female</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<div class="checkbox">
											<label>
												<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
											</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-danger" id="ButtonSubmit">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /.tab-pane -->

						<div class="tab-pane" id="changePassword">
							<form class="form-horizontal">
								<div class="form-group">
									<label for="InputOldPassword" class="col-sm-2 control-label">Old Password</label>
									<div class="col-sm-12 input-group">
										<input type="password" class="form-control" id="InputOldPassword" placeholder="Enter Old Password">
										<div class="input-group-append">
											<span class="input-group-text toggle-password" style="cursor: pointer;"><i class="fas fa-eye-slash"></i></span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="InputNewPassword" class="col-sm-2 control-label">New Password</label>

									<div class="col-sm-12 input-group">
										<input type="password" class="form-control" id="InputNewPassword" placeholder="Enter New Password" disabled="disabled">
										<div class="input-group-append">
											<span class="input-group-text toggle-password" style="cursor: pointer;"><i class="fas fa-eye-slash"></i></span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="InputRepeatNewPassword" class="col-sm-2 control-label">Repeat New Password</label>

									<div class="col-sm-12 input-group">
										<input type="password" class="form-control" id="InputRepeatNewPassword" placeholder="Repeat New Password" disabled="disabled">
										<div class="input-group-append">
											<span class="input-group-text toggle-password" style="cursor: pointer;"><i class="fas fa-eye-slash"></i></span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-primary" id="ButtonPasswordSubmit" disabled="disabled">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div><!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</div><!-- /.container-fluid -->

