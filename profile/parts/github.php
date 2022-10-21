<!-- === Modal === -->

<?php 
$user_id = $_SESSION['user_id'];
$Query   = $db->prepare("SELECT github FROM users WHERE id = ?");
$Query->execute(array($user_id));
$r = $Query->fetch(PDO::FETCH_OBJ);
if(empty($r->github)){
  $github = "Add GitHub Account";
} else {
  $github = "Update GitHub";
}
$github_db = $r->github;


 ?>
                    <div class="modal fade" id="github" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title"><?php echo $github; ?></h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div><!-- modal-header --> 
                               <div class="modal-body">
                                   <form action="">
                                       <div class="form-group">
                                         <input type="text" class="form-control profile-input" id="add_github" placeholder="Add GitHub Account" value="<?php if(isset($github_db)): echo $github_db; endif;?>">
                                         <div class="github-error error"></div>
                                       </div><!-- form-group -->
                                       <div class="modal-footer">
                                           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                           <button type="button" class="btn btn-success" onclick="add_github_account(this.form.add_github.value);">Save Changes</button>
                                       </div><!-- modal-footer -->
                                   </form>
                               </div><!-- modal-body -->
                            </div><!-- modal-content -->
                            
                        </div><!-- modal-dialog -->
                        
                    </div><!-- modal -->