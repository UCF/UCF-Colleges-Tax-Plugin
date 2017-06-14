<?php
/**
 * Provides an API point for colleges
 **/
if ( ! class_exists( 'UCF_College_API' ) ) {
    class UCF_College_API {
        /**
         * Registers the colleges rest routes
         * @author Jim Barnes
         * @since 1.0.1
         **/
        public static function register_rest_routes() {
            self::register_fields();
        }

        /**
         * Registers additional fields to colleges
         * @author Jim Barnes
         * @since 1.0.1
         **/
        public static function register_fields() {
            register_rest_field(
                'colleges',
                'alias',
                array(
                    'get_callback'    => array( 'UCF_College_API', 'add_alias_field' ),
                    'update_callback' => null,
                    'schema'          => null
                )
            );
        }

        /**
         * Adds the alias field to the colleges api
         * @author Jim Barnes
         * @since 1.0.1
         * @param $object Array | The array of college data
         * @return (string|null) | The alias of the college
         **/
        public static function add_alias_field( $object ) {
            $term_id = $object['id'];
            $alias = get_term_meta( $term_id, 'colleges_alias', true );
            
            return ! empty( $alias ) ? $alias : null;
        }
    }
}