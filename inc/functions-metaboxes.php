<?php

function meta_boxes() {
    $meta_boxes = array(
        // Level 1 page options
        array(
            'id' => 'page_options',
            'title' => 'Sports page options',
            'pages' => 'page',
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Dates/times',
                    'desc' => '',
                    'id' => 'dates',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => 'Age groups',
                    'desc' => '',
                    'id' => 'age',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => 'Gender',
                    'desc' => '',
                    'id' => 'gender',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => 'Map',
                    'desc' => 'Add your Google map embed code here',
                    'id' => 'google-map',
                    'type' => 'textarea',
                    'std' => ''
                ),
                array(
                    'name' => 'Fee',
                    'desc' => '',
                    'id' => 'fee',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => 'Contact',
                    'desc' => '',
                    'id' => 'contact-details',
                    'type' => 'textarea',
                    'std' => ''
                )
            )
        )
    );
    foreach ( $meta_boxes as $meta_box ) {
        $home_box = new create_meta_box( $meta_box );
    }
}


// Creates meta boxes from $meta_boxes[] = array()
// See http://www.deluxeblogtips.com/2010/05/howto-meta-box-wordpress.html for more info
class create_meta_box {
    protected $_meta_box;
    // create meta box based on given data
    function __construct($meta_box) {
        $this->_meta_box = $meta_box;
        add_action('admin_menu', array(&$this, 'add'));
        add_action('save_post', array(&$this, 'save'));
    }
    /// Add meta box
    function add() {
        add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), 'page', $this->_meta_box['context'], $this->_meta_box['priority']);
    }
    // Callback function to show fields in meta box
    function show() {
        global $post;
        // Use nonce for verification
        echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
        echo '<table class="form-table">';
        foreach ($this->_meta_box['fields'] as $field) {
            // get current post meta data
            $meta = get_post_meta($post->ID, $field['id'], true);
            echo '<tr>',
            '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
            '<td>';
            switch ($field['type']) {
                case 'text':
                    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
                    '<br />', $field['desc'];
                    break;
                case 'textarea':
                    $args = array (
                        'media_buttons' => false,
                        'textarea_rows' => 4,
                        'tinymce' => false,
                        'quicktags' => array( 'buttons' => 'strong,em,ul,ol,li,link' ),
                        'wpautop' => false
                    );
                    wp_editor( $meta, $field['id'], $args );
                    // echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
                    echo '<br />', $field['desc'];
                    break;
                case 'select':
                    echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                    foreach ($field['options'] as $option) {
                        echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                    }
                    echo '</select>';
                    echo ' ', $field['desc'];
                    break;
                case 'radio':
                    foreach ($field['options'] as $option) {
                        echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                    }
                    break;
                case 'checkbox':
                    echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                    break;
            }
            echo     '<td>',
            '</tr>';
        }
        echo '</table>';
    }
    // Save data from meta box
    function save($post_id) {
        // verify nonce
        if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        // check permissions
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
        foreach ($this->_meta_box['fields'] as $field) {
            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];
            if ($new && $new != $old) {
                update_post_meta($post_id, $field['id'], $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }
}
