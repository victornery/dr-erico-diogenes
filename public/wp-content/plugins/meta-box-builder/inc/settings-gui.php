<?php require MBB_INC_DIR . 'components/tabs.php'; ?>

<div id="settings-gui" ng-app="Builder">

	<div class="menu-settings" ng-controller="BuilderController" ng-init="init()">

		<h2 class="title"><?php esc_html_e( 'General', 'meta-box-builder' ); ?></h2>
		<table class="form-table">
			<tbody>
				<tr>
					<th><label><?php esc_html_e('Priority', 'meta-box-builder'); ?></label></th>
					<td>
						<ul class="builder-grid">
							<li class="builder-col">
								<label><input type="radio" ng-model="meta.priority" name="priority" value="high"> <?php _e('High', 'meta-box-builder'); ?></label>
							</li>
							<li class="builder-col">
								<label><input type="radio" ng-model="meta.priority" name="priority" value="low"> <?php _e('Low', 'meta-box-builder'); ?></label>
							</li>
						</ul>
					</td>
				</tr>
				<tr>
					<th><label><?php esc_html_e('Context', 'meta-box-builder'); ?></th>
					<td>
						<ul class="builder-grid">
							<li class="builder-col">
								<label>
									<input type="radio" ng-model="meta.context" name="context" value="normal"> <?php _e('Normal', 'meta-box-builder'); ?>
								</label>
							</li>
							<li class="builder-col">
								<label>
									<input type="radio" ng-model="meta.context" name="context" value="advanced"> <?php _e('Advanced', 'meta-box-builder'); ?>
								</label>
							</li>
							<li class="builder-col">
								<label>
									<input type="radio" ng-model="meta.context" name="context" value="side"> <?php _e('Side', 'meta-box-builder'); ?>
								</label>
							</li>
						</ul>
					</td>
				</tr>

				<tr>
					<th><label><?php esc_html_e('Post types', 'meta-box-builder'); ?></label></th>
					<td><select id="select-post-types" multiple="multiple" ng-model="meta.pages" ng-options="post_type as post_type for post_type in post_types"></select></td>
				</tr>

				<tr>
					<th><label for="metabox-auto-save"><?php esc_html_e('Autosave', 'meta-box-builder'); ?></label></th>
					<td>
						<input id="metabox-auto-save" ng-true-value="'true'" ng-false-value="'false'" type="checkbox" ng-model="meta.autosave"/>
					</td>
				</tr>

				<tr ng-show="tabExists">
					<th><label for="meta-box-tabs-style"><?php esc_html_e('Tabs', 'meta-box-builder'); ?></label></th>
					<td>
						<label><?php esc_html_e( 'Style', 'meta-box-builder' ); ?>
							<select ng-model="meta.tab_style">
								<option value="default"><?php _e( 'default', 'meta-box-builder' ); ?></option>
								<option value="box"><?php _e( 'box', 'meta-box-builder' ); ?></option>
								<option value="left"><?php _e( 'left', 'meta-box-builder' ); ?></option>
							</select>
						</label>

						<label><?php esc_html_e( 'Wrapper', 'meta-box-builder' ); ?>
							<input id="meta-box-tabs-wrapper" type="checkbox" ng-model="meta.tab_wrapper" ng-true-value="'true'" ng-false-value="'false'"/>
						</label>
					</td>
				</tr>

			</tbody>
		</table>

		<h2 class="title"><?php esc_html_e( 'Custom Attributes', 'meta-box-builder' ); ?></h2>
		<table class="form-table">
			<tbody>
				<tr>
					<td colspan="2">
						<table style="max-width: 690px" ng-show="meta.attrs.length > 0">
							<tr ng-repeat="attr in meta.attrs track by $index">
								<td class="col-xs-5" width="45%">
									<input ng-keydown="navigate($event, active.id, $index, 'key')"
										   ng-enter="addMetaBoxAttribute()" focus-on="metabox_key_{{$index}}"
										   type="text" class="form-control col-sm-6 input-sm" ng-model="attr.key"
										   placeholder="Enter key"/>
								</td>

								<td class="col-xs-6" width="45%">
									<input style="width: 100%" type="text" class="form-control col-sm-6 input-sm" ng-model="attr.value" placeholder="Enter value">
								</td>

								<td class="col-xs-1" width="5%">
									<button type="button" class="button" ng-click="removeMetaBoxAttribute($index);"><span class="dashicons dashicons-trash"></span></button>
								</td>
							</tr>
						</table>
						<button type="button" class="button custom-attributes__button" ng-click="addMetaBoxAttribute();"><?php esc_html_e( '+ Attribute', 'meta-box-builder' ); ?></button>
					</td>
				</tr>
			</tbody>
		</table>

		<h2 class="title"><?php esc_html_e( 'Conditional Logic', 'meta-box-builder' ); ?></h2>

		<table class="form-table">
			<tbody>
				<tr>
					<td colspan="2">
						<section class="builder-conditional-logic" ng-show="meta.logic">
							<label>
								<?php esc_html_e( 'This conditional logic applies to current Meta Box, for fields conditional logic, please go to each field and set.', 'meta-box-builder' ); ?>
							</label>

							<div class="conditional-logic__description">
								<select ng-model="meta.logic.visibility">
									<option value="visible"><?php _e( 'Visible', 'meta-box-builder' ); ?></option>
									<option value="hidden"><?php _e( 'Hidden', 'meta-box-builder' ); ?></option>
								</select>

								<?php _e( 'when', 'meta-box-builder' ); ?>

								<select ng-model="meta.logic.relation">
									<option value="and"><?php _e( 'All', 'meta-box-builder' ); ?></option>
									<option value="or"><?php _e( 'Any', 'meta-box-builder' ); ?></option>
								</select>

								<?php _e( 'of these conditions match', 'meta-box-builder' ); ?>
							</div>

							<table class="table conditional-logic__table" style="max-width: 690px" ng-show="meta.logic.when.length > 0">
								<tr ng-repeat="item in meta.logic.when track by $index">
									<td width="35%">
										<input type="text" ng-model="meta.logic.when[$index][0]"
											   list="available_fields" placeholder="Select or enter a field...">
									</td>
									<td width="15%">
										<select ng-model="meta.logic.when[$index][1]">
											<option value="=">=</option>
											<option value=">">></option>
											<option value="<">&lt;</option>
											<option value=">=">>=</option>
											<option value="<=">&lt;=</option>
											<option value="!=">!=</option>
											<option value="contains">contains</option>
											<option value="not contains">not contains</option>
											<option value="starts with">starts with</option>
											<option value="not starts with">not starts with</option>
											<option value="ends with">ends with</option>
											<option value="not ends with">not ends with</option>
											<option value="between">between</option>
											<option value="not between">not between</option>
											<option value="in">in</option>
											<option value="not in">not in</option>
											<option value="match">match</option>
											<option value="not match">not match</option>
										</select>
									</td>
									<td width="35%">
										<input type="text" ng-model="meta.logic.when[$index][2]"
											   placeholder="Enter a value...">
									</td>
									<td width="5%">
										<button type="button" class="button"
												ng-click="removeConditionalLogic($index, 'meta');">
											<span class="dashicons dashicons-trash"></span>
										</button>
									</td>
								</tr>
							</table>
						</section>
						<button type="button" class="button conditional-logic__button" ng-click="addConditionalLogic('meta');"><?php esc_html_e( '+ Condition', 'meta-box-builder' ); ?></button>
					</td>
				</tr>
			</tbody>
		</table>

		<div class="extensions" style="margin-top: 30px">
		<?php Meta_Box_Show_Hide_Template::show(); ?>
		<?php Meta_Box_Include_Exclude_Template::show(); ?>
		</div>

		<input type="hidden" name="excerpt" value="{{meta}}"/>
		<input type="hidden" name="tab" value="settings">
	</div><!--.menu-settings-->
</div>

<div class="publishing-action">
	<input type="submit" id="bind_submit" name="save_metabox" class="button button-primary menu-save" value="<?php esc_html_e('Save Changes', 'meta-box-builder'); ?>">
</div><!-- END .publishing-action -->
