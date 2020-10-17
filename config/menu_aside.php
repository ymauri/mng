<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Home',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        // Configurations
        [
            'title' => 'Configurations',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Users',
                    'bullet' => 'dot',
                    'page' => '/user'
                ],
                [
                    'title' => 'Roles',
                    'bullet' => 'dot',
                    'page' => '/role'
                ],
                [
                    'title' => 'Staff',
                    'bullet' => 'dot',
                    'page' => '/staff'
                ],
                [
                    'title' => 'Sources',
                    'bullet' => 'dot',
                    'page' => '/source'
                ],
                [
                    'title' => 'Listings',
                    'bullet' => 'dot',
                    'page' => '/listing'
                ],
                [
                    'title' => 'Help contents',
                    'bullet' => 'dot',
                    'page' => '/help'
                ],
                [
                    'title' => 'Global settings',
                    'bullet' => 'dot',
                    'page' => '/parameters'
                ],
            ]
        ],

        // Guesty
        [
            'title' => 'Guesty',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Reservations',
                    'bullet' => 'dot',
                    'page' => '/reservations'
                ],
            ]
        ],

        // [
        //     'title' => 'Pages',
        //     'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Wizard',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Wizard 1',
        //                     'page' => 'custom/pages/wizard/wizard-1'
        //                 ],
        //                 [
        //                     'title' => 'Wizard 2',
        //                     'page' => 'custom/pages/wizard/wizard-2'
        //                 ],
        //                 [
        //                     'title' => 'Wizard 3',
        //                     'page' => 'custom/pages/wizard/wizard-3'
        //                 ],
        //                 [
        //                     'title' => 'Wizard 4',
        //                     'page' => 'custom/pages/wizard/wizard-4'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Pricing Tables',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Pricing Tables 1',
        //                     'page' => 'custom/pages/pricing/pricing-1'
        //                 ],
        //                 [
        //                     'title' => 'Pricing Tables 2',
        //                     'page' => 'custom/pages/pricing/pricing-2'
        //                 ],
        //                 [
        //                     'title' => 'Pricing Tables 3',
        //                     'page' => 'custom/pages/pricing/pricing-3'
        //                 ],
        //                 [
        //                     'title' => 'Pricing Tables 4',
        //                     'page' => 'custom/pages/pricing/pricing-4'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Invoices',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Invoice 1',
        //                     'page' => 'custom/pages/invoices/invoice-1'
        //                 ],
        //                 [
        //                     'title' => 'Invoice 2',
        //                     'page' => 'custom/pages/invoices/invoice-2'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'User Pages',
        //             'bullet' => 'dot',
        //             'label' => [
        //                 'type' => 'label-rounded label-primary',
        //                 'value' => '2'
        //             ],
        //             'submenu' => [
        //                 [
        //                     'title' => 'Login 1',
        //                     'page' => 'custom/pages/users/login-1',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Login 2',
        //                     'page' => 'custom/pages/users/login-2',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Login 3',
        //                     'page' => 'custom/pages/users/login-3',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Login 4',
        //                     'page' => 'custom/pages/users/login-4',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Login 5',
        //                     'page' => 'custom/pages/users/login-5',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Login 6',
        //                     'page' => 'custom/pages/users/login-6',
        //                     'new-tab' => true
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Error Pages',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Error 1',
        //                     'page' => 'custom/pages/errors/error-1',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Error 2',
        //                     'page' => 'custom/pages/errors/error-2',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Error 3',
        //                     'page' => 'custom/pages/errors/error-3',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Error 4',
        //                     'page' => 'custom/pages/errors/error-4',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Error 5',
        //                     'page' => 'custom/pages/errors/error-5',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Error 6',
        //                     'page' => 'custom/pages/errors/error-6',
        //                     'new-tab' => true
        //                 ]
        //             ]
        //         ]
        //     ]
        // ],

        // // Layout
        // [
        //     'section' => 'Layout',
        // ],
        // [
        //     'title' => 'Themes',
        //     'desc' => '',
        //     'icon' => 'media/svg/icons/Design/Bucket.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Light Aside',
        //             'page' => 'layout/themes/aside-light'
        //         ],
        //         [
        //             'title' => 'Dark Header',
        //             'page' => 'layout/themes/header-dark'
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Subheaders',
        //     'desc' => '',
        //     'icon' => 'media/svg/icons/Code/Compiling.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Toolbar Nav',
        //             'page' => 'layout/subheader/toolbar'
        //         ],
        //         [
        //             'title' => 'Actions Buttons',
        //             'page' => 'layout/subheader/actions'
        //         ],
        //         [
        //             'title' => 'Tabbed Nav',
        //             'page' => 'layout/subheader/tabbed'
        //         ],
        //         [
        //             'title' => 'Classic',
        //             'page' => 'layout/subheader/classic'
        //         ],
        //         [
        //             'title' => 'None',
        //             'page' => 'layout/subheader/none'
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'General',
        //     'icon' => 'media/svg/icons/General/Settings-1.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Fixed Content',
        //             'page' => 'layout/general/fixed-content'
        //         ],
        //         [
        //             'title' => 'Minimized Aside',
        //             'page' => 'layout/general/minimized-aside'
        //         ],
        //         [
        //             'title' => 'No Aside',
        //             'page' => 'layout/general/no-aside'
        //         ],
        //         [
        //             'title' => 'Empty Page',
        //             'page' => 'layout/general/empty-page'
        //         ],
        //         [
        //             'title' => 'Fixed Footer',
        //             'page' => 'layout/general/fixed-footer'
        //         ],
        //         [
        //             'title' => 'No Header Menu',
        //             'page' => 'layout/general/no-header-menu'
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Builder',
        //     'root' => true,
        //     'icon' => 'media/svg/icons/Home/Library.svg',
        //     'page' => 'builder',
        //     'visible' => 'preview',
        // ],

        // // CRUD
        // [
        //     'section' => 'CRUD',
        // ],
        // [
        //     'title' => 'Forms',
        //     'icon' => 'media/svg/icons/Design/PenAndRuller.svg',
        //     'root' => true,
        //     'bullet' => 'dot',
        //     'submenu' => [
        //         [
        //             'title' => 'Form Controls',
        //             'desc' => '',
        //             'icon' => 'flaticon-interface-3',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Base Inputs',
        //                     'page' => 'crud/forms/controls/base'
        //                 ],
        //                 [
        //                     'title' => 'Input Groups',
        //                     'page' => 'crud/forms/controls/input-group'
        //                 ],
        //                 [
        //                     'title' => 'Checkbox',
        //                     'page' => 'crud/forms/controls/checkbox'
        //                 ],
        //                 [
        //                     'title' => 'Radio',
        //                     'page' => 'crud/forms/controls/radio'
        //                 ],
        //                 [
        //                     'title' => 'Switch',
        //                     'page' => 'crud/forms/controls/switch'
        //                 ],
        //                 [
        //                     'title' => 'Mega Options',
        //                     'page' => 'crud/forms/controls/option'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Form Widgets',
        //             'desc' => '',
        //             'icon' => 'flaticon-interface-1',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Datepicker',
        //                     'page' => 'crud/forms/widgets/bootstrap-datepicker'
        //                 ],
        //                 [
        //                     'title' => 'Datetimepicker',
        //                     'page' => 'crud/forms/widgets/bootstrap-datetimepicker'
        //                 ],
        //                 [
        //                     'title' => 'Timepicker',
        //                     'page' => 'crud/forms/widgets/bootstrap-timepicker'
        //                 ],
        //                 [
        //                     'title' => 'Daterangepicker',
        //                     'page' => 'crud/forms/widgets/bootstrap-daterangepicker'
        //                 ],
        //                 [
        //                     'title' => 'Tagify',
        //                     'page' => 'crud/forms/widgets/tagify'
        //                 ],
        //                 [
        //                     'title' => 'Touchspin',
        //                     'page' => 'crud/forms/widgets/bootstrap-touchspin'
        //                 ],
        //                 [
        //                     'title' => 'Maxlength',
        //                     'page' => 'crud/forms/widgets/bootstrap-maxlength'
        //                 ],
        //                 [
        //                     'title' => 'Switch',
        //                     'page' => 'crud/forms/widgets/bootstrap-switch'
        //                 ],
        //                 [
        //                     'title' => 'Multiple Select Splitter',
        //                     'page' => 'crud/forms/widgets/bootstrap-multipleselectsplitter'
        //                 ],
        //                 [
        //                     'title' => 'Bootstrap Select',
        //                     'page' => 'crud/forms/widgets/bootstrap-select'
        //                 ],
        //                 [
        //                     'title' => 'Select2',
        //                     'page' => 'crud/forms/widgets/select2'
        //                 ],
        //                 [
        //                     'title' => 'Typeahead',
        //                     'page' => 'crud/forms/widgets/typeahead'
        //                 ],
        //                 [
        //                     'title' => 'noUiSlider',
        //                     'page' => 'crud/forms/widgets/nouislider'
        //                 ],
        //                 [
        //                     'title' => 'Form Repeater',
        //                     'page' => 'crud/forms/widgets/form-repeater'
        //                 ],

        //                 [
        //                     'title' => 'Ion Range Slider',
        //                     'page' => 'crud/forms/widgets/ion-range-slider'
        //                 ],
        //                 [
        //                     'title' => 'Input Masks',
        //                     'page' => 'crud/forms/widgets/input-mask'
        //                 ],

        //                 [
        //                     'title' => 'Autosize',
        //                     'page' => 'crud/forms/widgets/autosize'
        //                 ],
        //                 [
        //                     'title' => 'Clipboard',
        //                     'page' => 'crud/forms/widgets/clipboard'
        //                 ],
        //                 [
        //                     'title' => 'Google reCaptcha',
        //                     'page' => 'crud/forms/widgets/recaptcha'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Form Text Editors',
        //             'desc' => '',
        //             'icon' => 'flaticon-interface-1',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'TinyMCE',
        //                     'page' => 'crud/forms/editors/tinymce'
        //                 ],
        //                 [
        //                     'title' => 'CKEditor',
        //                     'bullet' => 'line',
        //                     'submenu' => [
        //                         [
        //                             'title' => 'CKEditor Classic',
        //                             'page' => 'crud/forms/editors/ckeditor-classic'
        //                         ],
        //                         [
        //                             'title' => 'CKEditor Inline',
        //                             'page' => 'crud/forms/editors/ckeditor-inline'
        //                         ],
        //                         [
        //                             'title' => 'CKEditor Balloon',
        //                             'page' => 'crud/forms/editors/ckeditor-balloon'
        //                         ],
        //                         [
        //                             'title' => 'CKEditor Balloon Block',
        //                             'page' => 'crud/forms/editors/ckeditor-balloon-block'
        //                         ],
        //                         [
        //                             'title' => 'CKEditor Document',
        //                             'page' => 'crud/forms/editors/ckeditor-document'
        //                         ],
        //                     ]
        //                 ],
        //                 [
        //                     'title' => 'Quill Text Editor',
        //                     'page' => 'crud/forms/editors/quill'
        //                 ],
        //                 [
        //                     'title' => 'Summernote WYSIWYG',
        //                     'page' => 'crud/forms/editors/summernote'
        //                 ],
        //                 [
        //                     'title' => 'Markdown Editor',
        //                     'page' => 'crud/forms/editors/bootstrap-markdown'
        //                 ],
        //             ]
        //         ],
        //         [
        //             'title' => 'Form Layouts',
        //             'desc' => '',
        //             'icon' => 'flaticon-web',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Default Forms',
        //                     'page' => 'crud/forms/layouts/default-forms'
        //                 ],
        //                 [
        //                     'title' => 'Multi Column Forms',
        //                     'page' => 'crud/forms/layouts/multi-column-forms'
        //                 ],
        //                 [
        //                     'title' => 'Basic Action Bars',
        //                     'page' => 'crud/forms/layouts/action-bars'
        //                 ],
        //                 [
        //                     'title' => 'Sticky Action Bar',
        //                     'page' => 'crud/forms/layouts/sticky-action-bar'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Form Validation',
        //             'desc' => '',
        //             'icon' => 'flaticon-calendar-2',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Validation States',
        //                     'page' => 'crud/forms/validation/states'
        //                 ],
        //                 [
        //                     'title' => 'Form Controls',
        //                     'page' => 'crud/forms/validation/form-controls'
        //                 ],
        //                 [
        //                     'title' => 'Form Widgets',
        //                     'page' => 'crud/forms/validation/form-widgets'
        //                 ]
        //             ]
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'KTDatatable',
        //     'icon' => 'media/svg/icons/Layout/Layout-left-panel-2.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Base',
        //             'desc' => '',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Local Data',
        //                     'page' => 'crud/ktdatatable/base/data-local',
        //                     'icon' => '',
        //                 ],
        //                 [
        //                     'title' => 'JSON Data',
        //                     'page' => 'crud/ktdatatable/base/data-json',
        //                     'icon' => '',
        //                 ],
        //                 [
        //                     'title' => 'Ajax Data',
        //                     'page' => 'crud/ktdatatable/base/data-ajax',
        //                     'icon' => '',
        //                 ],
        //                 [
        //                     'title' => 'HTML Table',
        //                     'page' => 'crud/ktdatatable/base/html-table',
        //                     'icon' => '',
        //                 ],
        //                 [
        //                     'title' => 'Local Sort',
        //                     'page' => 'crud/ktdatatable/base/local-sort',
        //                     'icon' => '',
        //                 ],
        //                 [
        //                     'title' => 'Translation',
        //                     'page' => 'crud/ktdatatable/base/translation',
        //                     'icon' => '',
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Advanced',
        //             'desc' => '',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Record Selection',
        //                     'page' => 'crud/ktdatatable/advanced/record-selection',
        //                     'icon' => '',
        //                 ],
        //                 [
        //                     'title' => 'Row Details',
        //                     'page' => 'crud/ktdatatable/advanced/row-details',
        //                     'icon' => '',
        //                 ],
        //                 [
        //                     'title' => 'Modal Examples',
        //                     'page' => 'crud/ktdatatable/advanced/modal',
        //                     'icon' => '',
        //                 ],
        //                 [
        //                     'title' => 'Column Rendering',
        //                     'page' => 'crud/ktdatatable/advanced/column-rendering',
        //                     'icon' => '',
        //                 ],
        //                 [
        //                     'title' => 'Column Width',
        //                     'page' => 'crud/ktdatatable/advanced/column-width',
        //                     'icon' => '',
        //                 ],
        //                 [
        //                     'title' => 'Vertical Scrolling',
        //                     'page' => 'crud/ktdatatable/advanced/vertical',
        //                     'icon' => ''
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Child Datatables',
        //             'desc' => '',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Local Data',
        //                     'page' => 'crud/ktdatatable/child/data-local',
        //                     'icon' => ''
        //                 ],
        //                 [
        //                     'title' => 'Remote Data',
        //                     'page' => 'crud/ktdatatable/child/data-ajax',
        //                     'icon' => ''
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'API',
        //             'desc' => '',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'API Methods',
        //                     'page' => 'crud/ktdatatable/api/methods',
        //                     'icon' => ''
        //                 ],
        //                 [
        //                     'title' => 'Events',
        //                     'page' => 'crud/ktdatatable/api/events',
        //                     'icon' => ''
        //                 ]
        //             ]
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Datatables.net',
        //     'icon' => 'media/svg/icons/Layout/Layout-horizontal.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Basic',
        //             'desc' => '',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Basic Tables',
        //                     'page' => 'crud/datatables/basic/basic',
        //                 ],
        //                 [
        //                     'title' => 'Scrollable Tables',
        //                     'page' => 'crud/datatables/basic/scrollable',
        //                 ],
        //                 [
        //                     'title' => 'Complex Headers',
        //                     'page' => 'crud/datatables/basic/headers',
        //                 ],
        //                 [
        //                     'title' => 'Pagination Options',
        //                     'page' => 'crud/datatables/basic/paginations',
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Advanced',
        //             'desc' => '',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Column Rendering',
        //                     'page' => 'crud/datatables/advanced/column-rendering',
        //                 ],
        //                 [
        //                     'title' => 'Multiple Controls',
        //                     'page' => 'crud/datatables/advanced/multiple-controls',
        //                 ],
        //                 [
        //                     'title' => 'Column Visibility',
        //                     'page' => 'crud/datatables/advanced/column-visibility',
        //                 ],
        //                 [
        //                     'title' => 'Row Callback',
        //                     'page' => 'crud/datatables/advanced/row-callback',
        //                 ],
        //                 [
        //                     'title' => 'Row Grouping',
        //                     'page' => 'crud/datatables/advanced/row-grouping',
        //                 ],
        //                 [
        //                     'title' => 'Footer Callback',
        //                     'page' => 'crud/datatables/advanced/footer-callback',
        //                 ],
        //             ]
        //         ],
        //         [
        //             'title' => 'Data sources',
        //             'desc' => '',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'HTML',
        //                     'page' => 'crud/datatables/data-sources/html',
        //                 ],
        //                 [
        //                     'title' => 'Javascript',
        //                     'page' => 'crud/datatables/data-sources/javascript',
        //                 ],
        //                 [
        //                     'title' => 'Ajax Client-side',
        //                     'page' => 'crud/datatables/data-sources/ajax-client-side',
        //                 ],
        //                 [
        //                     'title' => 'Ajax Server-side',
        //                     'page' => 'crud/datatables/data-sources/ajax-server-side',
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Search Options',
        //             'desc' => '',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Column Search',
        //                     'page' => 'crud/datatables/search-options/column-search',
        //                 ],
        //                 [
        //                     'title' => 'Advanced Search',
        //                     'page' => 'crud/datatables/search-options/advanced-search',
        //                 ],
        //             ]
        //         ],
        //         [
        //             'title' => 'Extensions',
        //             'desc' => '',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Buttons',
        //                     'page' => 'crud/datatables/extensions/buttons',
        //                 ],
        //                 [
        //                     'title' => 'ColReorder',
        //                     'page' => 'crud/datatables/extensions/colreorder',
        //                 ],
        //                 /*[
        //                     'title' => 'FixedColumns',
        //                     'page' => 'crud/datatables/extensions/fixedcolumns',
        //                 ],
        //                 [
        //                     'title' => 'FixedHeader',
        //                     'page' => 'crud/datatables/extensions/fixedheader',
        //                 ],*/
        //                 [
        //                     'title' => 'KeyTable',
        //                     'page' => 'crud/datatables/extensions/keytable',
        //                 ],
        //                 [
        //                     'title' => 'Responsive',
        //                     'page' => 'crud/datatables/extensions/responsive',
        //                 ],
        //                 [
        //                     'title' => 'RowGroup',
        //                     'page' => 'crud/datatables/extensions/rowgroup',
        //                 ],
        //                 [
        //                     'title' => 'RowReorder',
        //                     'page' => 'crud/datatables/extensions/rowreorder',
        //                 ],
        //                 [
        //                     'title' => 'Scroller',
        //                     'page' => 'crud/datatables/extensions/scroller',
        //                 ],
        //                 [
        //                     'title' => 'Select',
        //                     'page' => 'crud/datatables/extensions/select'
        //                 ]
        //             ]
        //         ],
        //     ]
        // ],
        // [
        //     'title' => 'File Upload',
        //     'desc' => '',
        //     'icon' => 'media/svg/icons/Files/Upload.svg',
        //     'bullet' => 'dot',
        //     'submenu' => [
        //         [
        //             'title' => 'Image Input',
        //             'page' => 'crud/file-upload/image-input',
        //         ],
        //         [
        //             'title' => 'DropzoneJS',
        //             'page' => 'crud/file-upload/dropzonejs',
        //             'label' => [
        //                 'type' => 'label-danger label-inline',
        //                 'value' => 'new'
        //             ]
        //         ],
        //         [
        //             'title' => 'Uppy',
        //             'page' => 'crud/file-upload/uppy',
        //         ]
        //     ]
        // ],

        // // Features
        // [
        //     'section' => 'Features',
        // ],
        // [
        //     'title' => 'Bootstrap',
        //     'icon' => 'media/svg/icons/Shopping/Box2.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Typography',
        //             'page' => 'features/bootstrap/typography'
        //         ],
        //         [
        //             'title' => 'Buttons',
        //             'page' => 'features/bootstrap/buttons'
        //         ],
        //         [
        //             'title' => 'Button Group',
        //             'page' => 'features/bootstrap/button-group'
        //         ],
        //         [
        //             'title' => 'Dropdown',
        //             'page' => 'features/bootstrap/dropdown'
        //         ],
        //         [
        //             'title' => 'Navs',
        //             'page' => 'features/bootstrap/navs'
        //         ],
        //         [
        //             'title' => 'Tables',
        //             'page' => 'features/bootstrap/tables'
        //         ],
        //         [
        //             'title' => 'Progress',
        //             'page' => 'features/bootstrap/progress'
        //         ],
        //         [
        //             'title' => 'Modal',
        //             'page' => 'features/bootstrap/modal'
        //         ],
        //         [
        //             'title' => 'Alerts',
        //             'page' => 'features/bootstrap/alerts'
        //         ],
        //         [
        //             'title' => 'Popover',
        //             'page' => 'features/bootstrap/popover'
        //         ],
        //         [
        //             'title' => 'Tooltip',
        //             'page' => 'features/bootstrap/tooltip'
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Custom',
        //     'icon' => 'media/svg/icons/Files/Pictures1.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Utilities',
        //             'page' => 'features/custom/utilities'
        //         ],
        //         [
        //             'title' => 'Labels',
        //             'page' => 'features/custom/label'
        //         ],
        //         [
        //             'title' => 'Line Tabs',
        //             'page' => 'features/custom/line-tabs'
        //         ],
        //         [
        //             'title' => 'Advance Navs',
        //             'page' => 'features/custom/advance-navs'
        //         ],
        //         [
        //             'title' => 'Timeline',
        //             'page' => 'features/custom/timeline'
        //         ],
        //         [
        //             'title' => 'Pagination',
        //             'page' => 'features/custom/pagination'
        //         ],
        //         [
        //             'title' => 'Symbol',
        //             'page' => 'features/custom/symbol'
        //         ],
        //         [
        //             'title' => 'Overlay',
        //             'page' => 'features/custom/overlay'
        //         ],
        //         [
        //             'title' => 'Spinners',
        //             'page' => 'features/custom/spinners'
        //         ],
        //         [
        //             'title' => 'Iconbox',
        //             'page' => 'features/custom/iconbox'
        //         ],
        //         [
        //             'title' => 'Callout',
        //             'page' => 'features/custom/callout'
        //         ],
        //         [
        //             'title' => 'Ribbons',
        //             'page' => 'features/custom/ribbons'
        //         ],
        //         [
        //             'title' => 'Accordions',
        //             'page' => 'features/custom/accordions'
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Cards',
        //     'icon' => 'media/svg/icons/Layout/Layout-arrange.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'General Cards',
        //             'page' => 'features/cards/general'
        //         ],
        //         [
        //             'title' => 'Stacked Cards',
        //             'page' => 'features/cards/stacked'
        //         ],
        //         [
        //             'title' => 'Tabbed Cards',
        //             'page' => 'features/cards/tabbed'
        //         ],
        //         [
        //             'title' => 'Draggable Cards',
        //             'page' => 'features/cards/draggable'
        //         ],
        //         [
        //             'title' => 'Cards Tools',
        //             'page' => 'features/cards/tools'
        //         ],
        //         [
        //             'title' => 'Sticky Cards',
        //             'page' => 'features/cards/sticky'
        //         ],
        //         [
        //             'title' => 'Stretched Cards',
        //             'page' => 'features/cards/stretched'
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Widgets',
        //     'icon' => 'media/svg/icons/Devices/Diagnostics.svg',
        //     'root' => true,
        //     'bullet' => 'dot',
        //     'submenu' => [
        //         [
        //             'title' => 'Lists',
        //             'page' => 'features/widgets/lists'
        //         ],
        //         [
        //             'title' => 'Stats',
        //             'page' => 'features/widgets/stats'
        //         ],
        //         [
        //             'title' => 'Charts',
        //             'page' => 'features/widgets/charts'
        //         ],
        //         [
        //             'title' => 'Mixed',
        //             'page' => 'features/widgets/mixed',
        //         ],
        //         [
        //             'title' => 'Tiles',
        //             'page' => 'features/widgets/tiles',
        //         ],
        //         [
        //             'title' => 'Engage',
        //             'page' => 'features/widgets/engage'
        //         ],
        //         [
        //             'title' => 'Base Tables',
        //             'page' => 'features/widgets/base-tables',
        //         ],
        //         [
        //             'title' => 'Advance Tables',
        //             'page' => 'features/widgets/advance-tables',
        //         ],
        //         [
        //             'title' => 'Forms',
        //             'page' => 'features/widgets/forms',
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Icons',
        //     'icon' => 'media/svg/icons/General/Attachment2.svg',
        //     'bullet' => 'dot',
        //     'submenu' => [
        //         [
        //             'title' => 'SVG Icons',
        //             'page' => 'features/icons/svg'
        //         ],
        //         [
        //             'title' => 'Flaticon',
        //             'page' => 'features/icons/flaticon'
        //         ],
        //         [
        //             'title' => 'Fontawesome 5',
        //             'page' => 'features/icons/fontawesome5'
        //         ],
        //         [
        //             'title' => 'Lineawesome',
        //             'page' => 'features/icons/lineawesome'
        //         ],
        //         [
        //             'title' => 'Socicons',
        //             'page' => 'features/icons/socicons'
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Calendar',
        //     'icon' => 'media/svg/icons/Design/Select.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Basic Calendar',
        //             'page' => 'features/calendar/basic'
        //         ],
        //         [
        //             'title' => 'List Views',
        //             'page' => 'features/calendar/list-view'
        //         ],
        //         [
        //             'title' => 'Google Calendar',
        //             'page' => 'features/calendar/google'
        //         ],
        //         [
        //             'title' => 'External Events',
        //             'page' => 'features/calendar/external-events'
        //         ],
        //         [
        //             'title' => 'Background Events',
        //             'page' => 'features/calendar/background-events'
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Charts',
        //     'icon' => 'media/svg/icons/Media/Equalizer.svg',
        //     'root' => true,
        //     'bullet' => 'dot',
        //     'submenu' => [
        //         [
        //             'title' => 'amCharts',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'amCharts Charts',
        //                     'page' => 'features/charts/amcharts/charts'
        //                 ],
        //                 [
        //                     'title' => 'amCharts Stock Charts',
        //                     'page' => 'features/charts/amcharts/stock-charts'
        //                 ],
        //                 [
        //                     'title' => 'amCharts Maps',
        //                     'page' => 'features/charts/amcharts/maps'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Flot Charts',
        //             'page' => 'features/charts/flotcharts'
        //         ],
        //         [
        //             'title' => 'Google Charts',
        //             'page' => 'features/charts/google-charts'
        //         ],
        //         [
        //             'title' => 'Morris Charts',
        //             'page' => 'features/charts/morris-charts'
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Maps',
        //     'icon' => 'media/svg/icons/Home/Book-open.svg',
        //     'root' => true,
        //     'bullet' => 'dot',
        //     'submenu' => [
        //         [
        //             'title' => 'Google Maps',
        //             'page' => 'features/maps/google-maps'
        //         ],
        //         [
        //             'title' => 'JQVMap',
        //             'page' => 'features/maps/jqvmap'
        //         ],
        //     ]
        // ],
        // [
        //     'title' => 'Miscellaneous',
        //     'icon' => 'media/svg/icons/Home/Mirror.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Kanban Board',
        //             'page' => 'features/miscellaneous/kanban-board'
        //         ],
        //         [
        //             'title' => 'Sticky Panels',
        //             'page' => 'features/miscellaneous/sticky-panels'
        //         ],
        //         [
        //             'title' => 'Block UI',
        //             'page' => 'features/miscellaneous/blockui'
        //         ],
        //         [
        //             'title' => 'Perfect Scrollbar',
        //             'page' => 'features/miscellaneous/perfect-scrollbar'
        //         ],
        //         [
        //             'title' => 'Tree View',
        //             'page' => 'features/miscellaneous/treeview'
        //         ],
        //         [
        //             'title' => 'Bootstrap Notify',
        //             'page' => 'features/miscellaneous/bootstrap-notify'
        //         ],
        //         [
        //             'title' => 'Toastr',
        //             'page' => 'features/miscellaneous/toastr'
        //         ],
        //         [
        //             'title' => 'SweetAlert2',
        //             'page' => 'features/miscellaneous/sweetalert2'
        //         ],
        //         [
        //             'title' => 'Dual Listbox',
        //             'page' => 'features/miscellaneous/dual-listbox'
        //         ],
        //         [
        //             'title' => 'Session Timeout',
        //             'page' => 'features/miscellaneous/session-timeout'
        //         ],
        //         [
        //             'title' => 'Idle Timer',
        //             'page' => 'features/miscellaneous/idle-timer'
        //         ]
        //     ]
        // ]
    ]

];
