<?php

class Meta_Box_Include_Exclude_Template
{
	public static function show()
	{
		if ( ! self::visible() )
			return;

        $templates = mbb_get_page_templates();
        $term_taxonomies = mbb_get_terms();

		?>
		<div class="meta-box-sortables">
            <div class="postbox closed">
              <div class="handlediv" title="Click to toggle"> <br></div>
                <h3 class="hndle ui-sortable-handle">Include Exclude <span class="label">Extension</span></h3>
                <div class="inside">
                   <dl class="extension" id="meta-box-include-exclude">
                    <dt class="howto"></dt>
                    <dd>

                      <dl>
                        <dt class="one-half"><label for="meta-includeexclude-type">Include / Exclude</label></dt>
                        <dd class="one-half">
                          <select id="meta-includeexclude-type" ng-model="meta.includeexclude.type" ng-init="meta.includeexclude.type = meta.includeexclude.type || 'off'">
                            <option value="off">Off (Always Show)</option>
                            <option value="include">Include</option>
                            <option value="exclude">Exclude</option>
                          </select>
                        </dd>
                      </dl>
                      
                      <div ng-hide="meta.includeexclude.type=='off' || meta.includeexclude.type==''">

                      <dl>
                        <dt class="one-half"><label for="meta-includeexclude-relation">Relation</label></dt>
                        <dd class="one-half">
                          <select id="meta-includeexclude-relation" ng-model="meta.includeexclude.relation" ng-init="meta.includeexclude.relation = meta.includeexclude.relation || 'OR'">
                            <option value="AND">AND</option>
                            <option value="OR">OR</option>
                          </select>
                        </dd>
                      </dl>

                      <div class="clear clearfix"></div>

                      <dl>
                        <dt class="one-half"><label for="meta-includeexclude-id">Post IDs</label></dt>
                        <dd class="one-half">
                          <textarea id="meta-includeexclude-id" rows="3" ng-model="meta.includeexclude.ID" class="form-control" placeholder="Enter post IDs, comma separated"></textarea>
                        </dd>
                      </dl>

                      <dl>
                        <dt class="one-half"><label for="meta-includeexclude-parent">Parents</label></dt>
                        <dd class="one-half">
                          <textarea rows="3" id="meta-includeexclude-parent" ng-model="meta.includeexclude.parent" class="form-control" placeholder="Enter parent IDs, comma separated"></textarea>
                        </dd>
                      </dl>

                      <dl>
                        <dt class="one-half"><label for="meta-includeexclude-slug">Slugs</label></dt>
                        <dd class="one-half">
                          <textarea rows="3" id="meta-includeexclude-slug" ng-model="meta.includeexclude.slug" class="form-control" placeholder="Enter post slugs, comma separated"></textarea>
                        </dd>
                      </dl>
                      
                      <?php if ( ! empty( $templates ) ): ?>
                      <dl>
                        <dt class"one-half"><label for="meta-includeexclude-template">Page Template</label></dt>
                        <dd>
                        <select id="meta-includeexclude-template" ng-model="meta.includeexclude.template" class="form-control" multiple>
                          <?php foreach ( $templates as $name => $file  ) : ?>
                          <option value="<?php echo $file ?>"><?php echo $name ?></option>
                          <?php endforeach; ?>
                        </select>
                        </dd>
                      </dl>
                      <?php endif; ?>
                      
                      <?php if ( ! empty( $term_taxonomies ) ): 
                          foreach ( $term_taxonomies as $name => $terms ) :
                            foreach (array('', 'parent_') as $prefix) :
                        ?>
                        <dl>
                          <dt class"one-half">
                          <label for="meta-includeexclude-<?php echo $prefix . $name ?>"><?php echo str_title($prefix) . ' ' . str_title( $name ); ?></label></dt>
                          <dd>
                            <select id="meta-includeexclude-<?php echo $prefix. $name ?>" ng-model="meta.includeexclude.<?php echo $prefix . $name ?>" class="form-control" multiple>
                              <?php foreach ( $terms as $id => $term_name ) : ?>
                              <option value="<?php echo $id ?>"><?php echo $term_name; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </dd>
                        </dl>
                      <?php endforeach; endforeach ; endif; ?>

                        <dl>
                          <dt class="one-half"><label for="meta-includeexclude-user-role">User Roles</label></dt>
                          <dd class="one-half">
                            <textarea id="meta-includeexclude-user-role" rows="3" ng-model="meta.includeexclude.user_role" class="form-control" placeholder="Enter role slugs, comma separated"></textarea><br>
                            <p class="description">Enter role slugs. Comma separated. For example: <code>administrator, editor</code></p>
                          </dd>
                        </dl>

                        <dl>
                          <dt class="one-half"><label for="meta-includeexclude-user-id">User IDs</label></dt>
                          <dd class="one-half">
                            <textarea id="meta-includeexclude-user-id" rows="3" ng-model="meta.includeexclude.user_id" class="form-control" placeholder="Enter user ids, comma separated"></textarea><br>
                          </dd>
                        </dl>

                        <dl>
                          <dt class="one-half"><label for="meta-includeexclude-is-child">Is Child</label></dt>
                          <dd class="one-half">
                            <input type="checkbox" id="meta-includeexclude-is-child" ng-model="meta.includeexclude.is_child" ng-true-value="1" ng-false-value="0">
                          </dd>
                        </dl>


                        <dl>
                        <dt class="one-half"><label for="meta-includeexclude-custom">Custom Conditional Callback</label></dt>
                        <dd class="one-half">
                          <input type="text" id="meta-includeexclude-custom" ng-model="meta.includeexclude.custom" placeholder="Enter callback function" />
                        </dd>
                      </dl>

                      </div>
                    </dd>
                  </dl>
                </div>
            </div><!--.postbox-closed-->
       	</div><!--.meta-box-sortables-->
       	<?php
	}

	public static function visible()
	{
		return class_exists( 'MB_Include_Exclude' );
	}
}