<?php
/*
 * Enable Use of the Total Field with Conditional Logic in Gravity forms
*/


class RW_GF_Total_Field_Logic {

    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
    }

    function init() {
        if ( ! property_exists( 'GFForms', 'version' ) || ! version_compare( GFForms::$version, '1.9', '>=' ) ) {
            return;
        }

        add_filter( 'gform_admin_pre_render', array( $this, 'enable_total_in_conditional_logic' ) );
    }

    function enable_total_in_conditional_logic( $form ) {
        if ( GFCommon::is_entry_detail() ) {
            return $form;
        }

        echo "<script type='text/javascript'>" .
             " gform.addFilter('gform_is_conditional_logic_field', function (isConditionalLogicField, field) {" .
             "     return field.type == 'total' ? true : isConditionalLogicField;" .
             '  });' .
             "  gform.addFilter('gform_conditional_logic_operators', function (operators, objectType, fieldId) {" .
             '      var targetField = GetFieldById(fieldId);' .
             "      if (targetField && targetField['type'] == 'total') {" .
             "          operators = {'>': 'greaterThan', '<': 'lessThan'};" .
             '      }' .
             '      return operators;' .
             '  });' .
             '</script>';

        return $form;
    }

}
new RW_GF_Total_Field_Logic();
