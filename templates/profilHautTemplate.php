<div id="profilHaut">
			<div class="row well ">
				<div class="col-md-12 cov">
						<div class="panel" style="background-image:url(<?php echo($photoC)?>);">
							<div class="name">
								<span class="bjr-mess"><strong> <?php echo $Pseudo ?></strong></span>
							<?php
							if($me){
								echo '<button id="chg-cov" type="button" class="btn pull-right" data-toggle="modal" data-target="#coverSelector"><span class="glyphicon glyphicon-picture"></span> Change cover</button>';
							}
							?>
							<ul class="pull-right">
							  <li><span data-toggle="tooltip" title="Parties jouées" data-placement="bottom" class="glyphicon glyphicon-king icon"></span><span><?php echo $partieT ?></span></li>
							  <li><span data-toggle="tooltip" title="Parties gagnées" data-placement="bottom" class="glyphicon glyphicon-thumbs-up icon"></span><span><?php echo $partieG ?></span></li>
							  <li><span data-toggle="tooltip" title="Parties perdues" data-placement="bottom" class="glyphicon glyphicon-thumbs-down icon"></span><span><?php echo $partieP ?></span></li>
							  <li><span data-toggle="tooltip" title="Rapport parties gagnées/jouées" data-placement="bottom" class="glyphicon glyphicon-stats icon"></span><span><?php echo number_format($averageWin, 2, '.', ',') ?></span></li>
							</ul>
							</div>
							<img class="pic img-circle" alt="..." src=<?php echo('"'.$photoP.'"')  ?>/>
						</div>
			 </div>
			</div>

			<div id="coverSelector" class="modal fade" role="dialog">
				<div class="modal-dialog modal-sm popup">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Changer la photo de couverture</h4>
				      </div>
				      <div class="modal-body">
									<form id="popUpForm" class="form-horizontal well" method="post" action="process_form.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-primary pull-right">Envoyer</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
				      </div>
				      </div>
				    </div>
				  </div>
			</div>
			</div>
