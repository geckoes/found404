			<div class="row">
				<div class="col-md-4 col-md-push-8">
					<!--          <section>
					<h4>Filter search for:</h4>
					<label>Text:
					<input type="text" id="search" name="search" ng-model="search">
					</label>
					</section>
					-->
					<div id="adv2" align="right">
						<script>
							! function(d, l, e, s, c) {
								e = d.createElement("script");
								e.src = "//ad.altervista.org/js.ad/size=300X250/?ref=" + encodeURIComponent(l.hostname + l.pathname) + "&r=" + Date.now();
								s = d.scripts;
								c = s[s.length - 1];
								c.parentNode.insertBefore(e, c);
							}(document, location);
						</script>
					</div>
				</div>
				<div class="col-sm-12 col-md-8 col-md-pull-4">
					<div class="warning" <?php if ($warning_message != '') echo 'style="display:block"';?>>
						<label name="message"><?php $warning_message?></label>
					</div>
					<div ng-include="main_container"></div>
					<div id="adv3">
						<script>
							! function(d, l, e, s, c) {
								e = d.createElement("script");
								e.src = "//ad.altervista.org/js.ad/size=300X250/?ref=" + encodeURIComponent(l.hostname + l.pathname) + "&r=" + Date.now();
								s = d.scripts;
								c = s[s.length - 1];
								c.parentNode.insertBefore(e, c);
							}(document, location);
						</script>
					</div>
				</div>
			</div>