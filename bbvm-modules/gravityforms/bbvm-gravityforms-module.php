<?php // phpcs:ignore
class BBVapor_Gravityforms_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Gravity Forms', 'bb-vapor-modules' ),
				'description'     => __( 'Gravity Forms for Beaver Builder', 'bb-vapor-modules' ),
				'category'        => __( 'External Plugins', 'bb-vapor-modules' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules' ) ),
				'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/gravityforms/',
				'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/gravityforms/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => true, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
$forms_array = array( '0' => __( 'Select a form', 'bb-vapor-modules' ) );
$forms       = GFAPI::get_forms();
if ( ! empty( $forms ) ) {
	foreach ( $forms as $form ) {
		$forms_array[ $form['id'] ] = $form['title'];
	}
}
FLBuilder::register_module(
	'BBVapor_Gravityforms_Module',
	array(
		'general'             => array(
			'title'    => __( 'General', 'bb-vapor-modules' ),
			'sections' => array(
				'general'  => array(
					'title'  => __( 'Form Select', 'bb-vapor-modules' ),
					'fields' => array(
						'form'                     => array(
							'type'    => 'select',
							'label'   => __( 'Select a form', 'bb-vapor-modules' ),
							'options' => $forms_array,
						),
						'form_title'               => array(
							'type'    => 'select',
							'label'   => __( 'Show form title', 'bb-vapor-modules' ),
							'options' => array(
								'no'     => __( 'No', 'bb-vapor-modules' ),
								'yes'    => __( 'Yes', 'bb-vapor-modules' ),
								'custom' => __( 'Custom', 'bb-vapor-modules' ),
							),
							'default' => 'no',
							'toggle'  => array(
								'custom' => array( 'fields' => array( 'custom_title' ) ),
							),
						),
						'form_title_padding'       => array(
							'type'  => 'dimension',
							'label' => __( 'Form Title Padding', 'bb-vapor-modules' ),
						),
						'form_title_margin'        => array(
							'type'  => 'dimension',
							'label' => __( 'Form Title Margin', 'bb-vapor-modules' ),
						),
						'custom_title'             => array(
							'type'  => 'text',
							'label' => __( 'Custom title', 'bb-vapor-modules' ),
						),
						'form_title_color'         => array(
							'type'  => 'color',
							'label' => __( 'Form title color', 'bb-vapor-modules' ),
						),
						'form_description'         => array(
							'type'    => 'select',
							'label'   => __( 'Show form description', 'bb-vapor-modules' ),
							'options' => array(
								'no'     => __( 'No', 'bb-vapor-modules' ),
								'yes'    => __( 'Yes', 'bb-vapor-modules' ),
								'custom' => __( 'Custom', 'bb-vapor-modules' ),
							),
							'default' => 'no',
							'toggle'  => array(
								'custom' => array( 'fields' => array( 'custom_description' ) ),
							),
						),
						'form_description_padding' => array(
							'type'  => 'dimension',
							'label' => __( 'Form Description Padding', 'bb-vapor-modules' ),
						),
						'form_description_margin'  => array(
							'type'  => 'dimension',
							'label' => __( 'Form Description Margin', 'bb-vapor-modules' ),
						),
						'custom_description'       => array(
							'type'  => 'text',
							'label' => __( 'Custom description', 'bb-vapor-modules' ),
						),
						'form_description_color'   => array(
							'type'  => 'color',
							'label' => __( 'Form description color', 'bb-vapor-modules' ),
						),
					),
				),
				'advanced' => array(
					'title'  => __( 'Advanced', 'bb-vapor-modules' ),
					'fields' => array(
						'ajax_only' => array(
							'type'    => 'select',
							'label'   => __( 'Ajax only form?', 'bb-vapor-modules' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules' ),
								'no'  => __( 'No', 'bb-vapor-modules' ),
							),
							'default' => 'no',
						),
						'tabindex'  => array(
							'type'    => 'unit',
							'label'   => __( 'Select a tabindex', 'bb-vapor-modules' ),
							'default' => '0',
						),
					),
				),
				'layout'   => array(
					'title'  => __( 'Layout', 'bb-vapor-modules' ),
					'fields' => array(
						'layout'    => array(
							'type'    => 'select',
							'label'   => __( 'Choose Layout', 'bb-vapor-modules' ),
							'options' => array(
								'default'             => __( 'Default', 'bb-vapor-modules' ),
								'full_width'          => __( 'Full Width', 'bb-vapor-modules' ),
								'full_width_centered' => __( 'Full Width Centered', 'bb-vapor-modules' ),
							),
							'default' => 'default',
						),
						'max_width' => array(
							'type'        => 'unit',
							'label'       => __( 'Select a maximum width for the form', 'bb-vapor-modules' ),
							'default'     => '100',
							'description' => '%',
							'responsive'  => true,
						),
					),
				),
			),
		),
		'styles'              => array(
			'title'    => __( 'Styles', 'bb-vapor-modules' ),
			'sections' => array(
				'styles'       => array(
					'title'  => __( 'General Styles', 'bb-vapor-modules' ),
					'fields' => array(
						'padding'               => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a padding', 'bb-vapor-modules' ),
							'responsive' => array(
								'placeholder' => array(
									'default'    => '15',
									'medium'     => '15',
									'responsive' => '15',
								),
							),
						),
						'form_margin'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a form margin', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'form_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a background color for your form', 'bb-vapor-modules' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'form_radius'           => array(
							'type'  => 'dimension',
							'label' => __( 'Select a border radius for your form', 'bb-vapor-modules' ),
						),
					),
				),
				'show_hide'    => array(
					'title'  => __( 'Show/Hide', 'bb-vapor-modules' ),
					'fields' => array(
						'form_show_labels'       => array(
							'type'    => 'select',
							'label'   => __( 'Show or hide labels', 'bb-vapor-modules' ),
							'options' => array(
								'yes' => __( 'Show labels', 'bb-vapor-modules' ),
								'no'  => __( 'Hide labels', 'bb-vapor-modules' ),
							),
							'default' => 'yes',
						),
						'form_show_description'  => array(
							'type'    => 'select',
							'label'   => __( 'Show or hide descriptions', 'bb-vapor-modules' ),
							'options' => array(
								'yes' => __( 'Show description', 'bb-vapor-modules' ),
								'no'  => __( 'Hide description', 'bb-vapor-modules' ),
							),
							'default' => 'yes',
						),
						'form_show_placeholders' => array(
							'type'    => 'select',
							'label'   => __( 'Show or hide placeholders', 'bb-vapor-modules' ),
							'options' => array(
								'yes' => __( 'Show placeholders', 'bb-vapor-modules' ),
								'no'  => __( 'Hide placeholders', 'bb-vapor-modules' ),
							),
							'default' => 'yes',
						),
					),
				),
				'labels'       => array(
					'title'  => __( 'Labels', 'bb-vapor-modules' ),
					'fields' => array(
						'form_label_color'     => array(
							'type'    => 'color',
							'label'   => __( 'Label Color', 'bb-vapor-modules' ),
							'default' => '000000',
						),
						'form_sub_label_color' => array(
							'type'    => 'color',
							'label'   => __( 'Sub-label Color', 'bb-vapor-modules' ),
							'default' => '000000',
						),
						'label_padding'        => array(
							'type'  => 'dimension',
							'label' => __( 'Label Padding', 'bb-vapor-modules' ),
						),
						'label_margin'         => array(
							'type'  => 'dimension',
							'label' => __( 'Label Margin', 'bb-vapor-modules' ),
						),
					),
				),
				'inputs'       => array(
					'title'  => __( 'Input styles', 'bb-vapor-modules' ),
					'fields' => array(
						'input_height'           => array(
							'type'        => 'unit',
							'label'       => __( 'Input Height', 'bb-vapor-modules' ),
							'description' => 'px',
							'default'     => '50',
						),
						'input_general_padding'  => array(
							'type'       => 'dimension',
							'label'      => __( 'Input General Padding', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'input_general_margin'   => array(
							'type'       => 'dimension',
							'label'      => __( 'Input General Margin', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'input_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Input padding', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'input_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Input background color', 'bb-vapor-modules' ),
							'default'    => 'FFFFFF',
							'show_alpha' => true,
						),
						'input_text_color'       => array(
							'type'    => 'color',
							'label'   => __( 'Input text color', 'bb-vapor-modules' ),
							'default' => '000000',
						),
						'input_border'           => array(
							'type'        => 'dimension',
							'label'       => __( 'Input border width', 'bb-vapor-modules' ),
							'description' => 'px',
						),
						'input_border_color'     => array(
							'type'    => 'color',
							'label'   => __( 'Input border color', 'bb-vapor-modules' ),
							'default' => 'e6e6e6',
						),
						'input_border_radius'    => array(
							'type'  => 'dimension',
							'label' => __( 'Input border_radius', 'bb-vapor-modules' ),
						),
						'input_text_align'       => array(
							'type'    => 'align',
							'label'   => __( 'Input text align', 'bb-vapor-modules' ),
							'default' => 'left',
						),
					),
				),
				'selects'      => array(
					'title'  => __( 'Select styles', 'bb-vapor-modules' ),
					'fields' => array(
						'select_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Select padding', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'select_height'  => array(
							'type'  => 'unit',
							'label' => __( 'Select height', 'bb-vapor-modules' ),
						),
						'select_align'   => array(
							'type'  => 'align',
							'label' => __( 'Select align', 'bb-vapor-modules' ),
						),
					),
				),
				'textarea'     => array(
					'title'  => __( 'Textarea styles', 'bb-vapor-modules' ),
					'fields' => array(
						'textarea_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Textarea background color', 'bb-vapor-modules' ),
							'default'    => 'FFFFFF',
							'show_alpha' => true,
						),
						'textarea_color'            => array(
							'type'    => 'color',
							'label'   => __( 'Textarea text color', 'bb-vapor-modules' ),
							'default' => '000000',
						),
						'textarea_border'           => array(
							'type'        => 'dimension',
							'label'       => __( 'Textarea border width', 'bb-vapor-modules' ),
							'description' => 'px',
						),
						'textarea_border_color'     => array(
							'type'    => 'color',
							'label'   => __( 'Textarea border color', 'bb-vapor-modules' ),
							'default' => 'e6e6e6',
						),
						'textarea_border_radius'    => array(
							'type'  => 'dimension',
							'label' => __( 'Textarea border radius', 'bb-vapor-modules' ),
						),
						'textarea_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Textarea padding', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'textarea_height'           => array(
							'type'    => 'unit',
							'label'   => __( 'Textarea height', 'bb-vapor-modules' ),
							'default' => '250',
						),
						'textarea_align'            => array(
							'type'    => 'align',
							'label'   => __( 'Textarea text align', 'bb-vapor-modules' ),
							'default' => 'left',
						),
					),
				),
				'lists'        => array(
					'title'  => __( 'List styles', 'bb-vapor-modules' ),
					'fields' => array(
						'list_size'            => array(
							'type'    => 'unit',
							'label'   => __( 'List bullet size', 'bb-vapor-modules' ),
							'default' => '20',
						),
						'list_background'      => array(
							'type'    => 'color',
							'label'   => __( 'List bullet background', 'bb-vapor-modules' ),
							'default' => 'FFFFFF',
						),
						'list_color'           => array(
							'type'  => 'color',
							'label' => __( 'List text color', 'bb-vapor-modules' ),
						),
						'list_selected_color'  => array(
							'type'    => 'color',
							'label'   => __( 'List item selected color', 'bb-vapor-modules' ),
							'default' => '000000',
						),
						'list_border'          => array(
							'type'  => 'unit',
							'label' => __( 'List border width', 'bb-vapor-modules' ),
						),
						'list_border_color'    => array(
							'type'  => 'color',
							'label' => __( 'List border color', 'bb-vapor-modules' ),
						),
						'list_radio_radius'    => array(
							'type'    => 'unit',
							'label'   => __( 'List radio radius', 'bb-vapor-modules' ),
							'default' => '50',
						),
						'list_checkbox_radius' => array(
							'type'    => 'unit',
							'label'   => __( 'List checkbox radius', 'bb-vapor-modules' ),
							'default' => '0',
						),
					),
				),
				'placeholders' => array(
					'title'  => __( 'Placeholder styles', 'bb-vapor-modules' ),
					'fields' => array(
						'placeholder_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Placeholder typography', 'bb-vapor-modules' ),
						),
						'placeholder_color'      => array(
							'type'  => 'color',
							'label' => __( 'Placeholder color', 'bb-vapor-modules' ),
						),
					),
				),
			),
		),
		'typography'          => array(
			'title'    => __( 'Typography', 'bb-vapor-modules' ),
			'sections' => array(
				'inputs' => array(
					'title'  => __( 'General typography', 'bb-vapor-modules' ),
					'fields' => array(
						'form_title_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Select an form title typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'form_description_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Select a form description typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'label_typography'            => array(
							'type'       => 'typography',
							'label'      => __( 'Select an label typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'sublabel_typography'         => array(
							'type'       => 'typography',
							'label'      => __( 'Select an sub-label typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'input_typography'            => array(
							'type'       => 'typography',
							'label'      => __( 'Select an input typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'select_typography'           => array(
							'type'       => 'typography',
							'label'      => __( 'Dropdown typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'list_typography'             => array(
							'type'       => 'typography',
							'label'      => __( 'List typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'textarea_typography'         => array(
							'type'       => 'typography',
							'label'      => __( 'Textarea typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'placeholder_typography'      => array(
							'type'       => 'typography',
							'label'      => __( 'Placeholder typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'buttons'             => array(
			'title'    => __( 'Buttons', 'bb-vapor-modules' ),
			'sections' => array(
				'inputs' => array(
					'title'  => __( 'Button styles', 'bb-vapor-modules' ),
					'fields' => array(
						'button_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Select button typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'button_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Select button padding', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'button_border'           => array(
							'type'    => 'unit',
							'label'   => __( 'Select button border width', 'bb-vapor-modules' ),
							'default' => '1',
						),
						'button_radius'           => array(
							'type'  => 'dimension',
							'label' => __( 'Select a button border radius', 'bb-vapor-modules' ),
						),
						'button_background'       => array(
							'type'       => 'color',
							'label'      => __( 'Select button background color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'default'    => '000000',
						),
						'button_background_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Select button background hover color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'default'    => '000000',
						),
						'button_color'            => array(
							'type'    => 'color',
							'label'   => __( 'Select button text color', 'bb-vapor-modules' ),
							'default' => 'FFFFFF',
						),
						'button_color_hover'      => array(
							'type'    => 'color',
							'label'   => __( 'Select button text hover color', 'bb-vapor-modules' ),
							'default' => 'FFFFFF',
						),
						'button_border'           => array(
							'type'  => 'unit',
							'label' => __( 'Select an button border width', 'bb-vapor-modules' ),
						),
						'button_border_color'     => array(
							'type'  => 'color',
							'label' => __( 'Select an button border color', 'bb-vapor-modules' ),
						),
					),
				),
			),
		),
		'errorsconfirmations' => array(
			'title'    => __( 'Errors/Confirmations', 'bb-vapor-modules' ),
			'sections' => array(
				'errors'        => array(
					'title'  => __( 'Errors', 'bb-vapor-modules' ),
					'fields' => array(
						'error_message_color'          => array(
							'type'    => 'color',
							'label'   => __( 'Select a message color', 'bb-vapor-modules' ),
							'default' => 'ce0000',
						),
						'error_message_typography'     => array(
							'type'  => 'typography',
							'label' => __( 'Select a message typography', 'bb-vapor-modules' ),
						),
						'error_label_color'            => array(
							'type'    => 'color',
							'label'   => __( 'Select a label color', 'bb-vapor-modules' ),
							'default' => '790000',
						),
						'error_label_background_color' => array(
							'type'    => 'color',
							'label'   => __( 'Select a label background color', 'bb-vapor-modules' ),
							'default' => 'ffdfe0',
						),
						'error_label_border_color'     => array(
							'type'    => 'color',
							'label'   => __( 'Select a label border color', 'bb-vapor-modules' ),
							'default' => '790000',
						),
						'error_label_border_width'     => array(
							'type'        => 'unit',
							'label'       => __( 'Select a label border width', 'bb-vapor-modules' ),
							'default'     => '1',
							'description' => 'px',
						),
					),
				),
				'confirmations' => array(
					'title'  => __( 'Confirmations', 'bb-vapor-modules' ),
					'fields' => array(
						'confirmation_color'            => array(
							'type'    => 'color',
							'label'   => __( 'Select a confirmation color', 'bb-vapor-modules' ),
							'default' => '3c763d',
						),
						'confirmation_background_color' => array(
							'type'    => 'color',
							'label'   => __( 'Select a confirmation background color', 'bb-vapor-modules' ),
							'default' => 'FFFFFF',
						),
						'confirmation_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a confirmation padding', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'confirmation_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Select confirmation typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'pagination'          => array(
			'title'    => __( 'Pagination', 'bb-vapor-modules' ),
			'sections' => array(
				'progress_bar'   => array(
					'title'  => __( 'Progress Bar', 'bb-vapor-modules' ),
					'fields' => array(
						'progress_title_show'              => array(
							'type'    => 'select',
							'label'   => __( 'Show progress bar title?', 'bb-vapor-modules' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules' ),
								'no'  => __( 'No', 'bb-vapor-modules' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'progress_title',
										'progress_title_color',
									),
								),
							),
						),
						'progress_title'                   => array(
							'type'  => 'typography',
							'label' => __( 'Progress title', 'bb-vapor-modules' ),
						),
						'progress_title_color'             => array(
							'type'  => 'color',
							'label' => __( 'Progress title color', 'bb-vapor-modules' ),
						),
						'progress_bar_outer_border_radius' => array(
							'type'        => 'unit',
							'label'       => __( 'Progress bar outer border radius', 'bb-vapor-modules' ),
							'default'     => '25',
							'description' => 'px',
						),
						'progress_bar_inner_border_radius' => array(
							'type'        => 'dimension',
							'label'       => __( 'Progress bar inner border radius', 'bb-vapor-modules' ),
							'description' => 'px',
						),
						'progress_bar_padding'             => array(
							'type'        => 'dimension',
							'label'       => __( 'Progress bar padding', 'bb-vapor-modules' ),
							'description' => 'px',
						),
						'progress_bar_inner_color'         => array(
							'type'  => 'color',
							'label' => __( 'Progress bar inner color', 'bb-vapor-modules' ),
						),
						'progress_bar_outer_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Progress bar outer color', 'bb-vapor-modules' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'progress_bar_text_color'          => array(
							'type'    => 'color',
							'label'   => __( 'Progress bar text color', 'bb-vapor-modules' ),
							'default' => 'FFFFFF',
						),
						'progress_bar_text_typography'     => array(
							'type'  => 'typography',
							'label' => __( 'Progress bar text typography', 'bb-vapor-modules' ),
						),
					),
				),
				'progress_steps' => array(
					'title'  => __( 'Progress Steps', 'bb-vapor-modules' ),
					'fields' => array(
						'progress_steps_internal_margin'   => array(
							'type'        => 'dimension',
							'label'       => __( 'Internal margin for progress steps', 'bb-vapor-modules' ),
							'description' => 'px',
							'responsive'  => true,
						),
						'progress_steps_padding'           => array(
							'type'        => 'dimension',
							'label'       => __( 'Padding for progress steps', 'bb-vapor-modules' ),
							'description' => 'px',
							'responsive'  => true,
						),
						'progress_steps_active_background_color' => array(
							'type'  => 'color',
							'label' => __( 'Active background color', 'bb-vapor-modules' ),
						),
						'progress_steps_active_text_color' => array(
							'type'  => 'color',
							'label' => __( 'Active text color', 'bb-vapor-modules' ),
						),
						'progress_steps_active_border_color' => array(
							'type'  => 'color',
							'label' => __( 'Active border color', 'bb-vapor-modules' ),
						),
						'progress_steps_active_border'     => array(
							'type'  => 'dimension',
							'label' => __( 'Active border width', 'bb-vapor-modules' ),
						),
						'progress_steps_active_border_radius' => array(
							'type'  => 'dimension',
							'label' => __( 'Active border radius', 'bb-vapor-modules' ),
						),
						'progress_steps_active_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Active typography', 'bb-vapor-modules' ),
						),
						'progress_steps_inactive_background_color' => array(
							'type'  => 'color',
							'label' => __( 'Inactive background color', 'bb-vapor-modules' ),
						),
						'progress_steps_inactive_text_color' => array(
							'type'  => 'color',
							'label' => __( 'Inactive text color', 'bb-vapor-modules' ),
						),
						'progress_steps_inactive_opacity'  => array(
							'type'   => 'unit',
							'label'  => __( 'Inctive opacity', 'bb-vapor-modules' ),
							'type'   => 'unit',
							'slider' => array(
								'min'  => 0,
								'max'  => 1,
								'step' => 0.1,
							),
						),
						'progress_steps_inactive_border_color' => array(
							'type'  => 'color',
							'label' => __( 'Inactive border color', 'bb-vapor-modules' ),
						),
						'progress_steps_inactive_border'   => array(
							'type'  => 'dimension',
							'label' => __( 'Inactive border width', 'bb-vapor-modules' ),
						),
						'progress_steps_inactive_border_radius' => array(
							'type'  => 'dimension',
							'label' => __( 'Inactive border radius', 'bb-vapor-modules' ),
						),
						'progress_steps_inactive_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Inactive typography', 'bb-vapor-modules' ),
						),
					),
				),
			),
		),
	)
);
