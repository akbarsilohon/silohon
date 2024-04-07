(function(){
    tinymce.PluginManager.add('silo_mce', function(editor, url){
        editor.addButton('silo_mce', {
            text: 'SILO',
            icon: 'icon silo_icon_mce',
            type: 'menubutton',
            menu: [
                {   // Add Menu Button ------------
                    //-----------------------------
                    text: 'BUTTON',
                    onclick: function(){
                        editor.windowManager.open({
                            title: 'Add Button ShortCode',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'BtnContent',
                                    label: 'Content',
                                    minWidth: 350,
                                    value: ''
                                },
                                {
                                    type: 'listbox',
                                    name: 'BtnColor',
                                    label: 'Colors',
                                    values: [
                                        {text: 'Black', value: 'black'},
                                        {text: 'Blue', value: 'blue'},
                                        {text: 'Green', value: 'green'},
                                        {text: 'Orange', value: 'orange'}
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'BtnUrl',
                                    label: 'URL',
                                    value: 'https://'
                                },
                                {
                                    type: 'checkbox',
                                    name: 'BtnBlank',
                                    label: 'Open In New Tab',
                                    velue: 'true'
                                }
                            ],
                            onsubmit: function( e ){
                                var BtnColor = e.data.BtnColor;
                                var BtnUrl = e.data.BtnUrl;
                                var BtnBlank = e.data.BtnBlank;
                                var BtnContent = e.data.BtnContent;
                                var BtnTarget = ( BtnBlank == true ? '_blank' : '' );

                                editor.insertContent('[silo-btn class="'+BtnColor+'" link="'+BtnUrl+'" target="'+BtnTarget+'"]'+BtnContent+'[/silo-btn]');
                            }
                        });
                    }
                }, // End Add Menu Button

                {
                    // Ads Code -------------------
                    // ----------------------------
                    text: 'ADS',
                    menu: [
                        {
                            text: '  Ads 1',
                            icon: 'icon ads_icon_mce',
                            onclick: function(){
                                editor.insertContent('[ads1]');
                            }
                        },
                        {
                            text: '  Ads 2',
                            icon: 'icon ads_icon_mce',
                            onclick: function(){
                                editor.insertContent('[ads2]');
                            }
                        }
                    ]
                }, // End Ads Shortcode

                {
                    // Table Of Content -------------------
                    // ------------------------------------
                    text: 'TOC',
                    onclick: function(){
                        editor.insertContent('[silo_toc]');
                    }
                }, // End TOC

                // Faqs
                {
                    text: 'FAQs',
                    icon: 'icon faq_silo_icon',
                    onclick: function(){

                        var bodyFaqs = [];

                        editor.windowManager.open({
                            title: 'Shortcode FAQs',
                            body: [
                                { // Judul Faqs -------------
                                    type: 'textbox',
                                    name: 'judulFaq',
                                    label: 'Judul FAQs',
                                    minWidth: 380,
                                    value: 'FAQs'
                                }, { // Paragraf Pembuka --------
                                    type: 'textbox',
                                    name: 'paragrafFaq',
                                    label: 'Kalimat Pembuka',
                                    value: '',
                                    multiline: true,
                                    minHeight: 80,
                                    placeholder: 'Paragraf pembuka untuk faq...'
                                }, { // Isi Faqs ---------------
                                    type: 'textbox',
                                    name: 'isiFaqs',
                                    label: 'Isi Faqs',
                                    value: '',
                                    multiline: true,
                                    minHeight: 80,
                                    placeholder: 'Kosongkan saja...'
                                }, { // Pertanyaan ---------------
                                    type: 'textbox',
                                    name: 'faqTanya',
                                    label: 'Pertanyaan',
                                    value: '',
                                }, { // Jawaban ------------------
                                    type: 'textbox',
                                    name: 'faqJawab',
                                    label: 'Jawaban',
                                    value: '',
                                    multiline: true,
                                    minHeight: 80
                                }, {
                                    type: 'button',
                                    text: 'Push Item',
                                    maxWidth: 80,
                                    onclick: function(){
                                        var Tanya = editor.windowManager.getWindows()[0].find('#faqTanya').value();
                                        var Jawab = editor.windowManager.getWindows()[0].find('#faqJawab').value();

                                        if( Tanya && Jawab ){
                                            var bodyFaq = '<p>[question]'+ Tanya +'[/question]</p>\n<p>[answer]'+ Jawab +'[/answer]</p>\n';
                                            bodyFaqs.push( bodyFaq );

                                            var faqTextarea = editor.windowManager.getWindows()[0].find('#isiFaqs');
                                            faqTextarea.value( bodyFaqs.join('\n') );

                                            // Mengosongkan Isi Faq Item sebelumnya
                                            editor.windowManager.getWindows()[0].find('#faqTanya').value('');
                                            editor.windowManager.getWindows()[0].find('#faqJawab').value('');
                                        }
                                    }
                                }
                            ], onsubmit: function( e ){
                                var jFaqs = e.data.judulFaq;
                                var pFaqs = e.data.paragrafFaq;
                                var cFaqs = e.data.isiFaqs;

                                var faqPush = '<p>[sl-faq judul="'+ jFaqs +'" textfaq="'+ pFaqs +'"]</p>'+ cFaqs +'<p>[/sl-faq]</p>';
                                editor.insertContent( faqPush );
                            }
                        });
                    }
                },

                // Youtube Embed
                {
                    text: 'Youtube Embed',
                    onclick: function(){
                        editor.windowManager.open({
                            title: 'Youtube Embed Video',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'ytTitle',
                                    label: 'Judul Video',
                                    value: '',
                                    palceholder: 'Kosongkan jika tidak ada..',
                                    minWidth: 380
                                }, {
                                    type: 'textbox',
                                    name: 'ytVideo',
                                    label: 'Video ID',
                                    value: '',
                                    palceholder: 'ID Video Youtube..'
                                }
                            ], onsubmit: function( e ){
                                var ytTitle = e.data.ytTitle;
                                var ytVideo = e.data.ytVideo;
                                var ytInserContent = '[sl-yt judul="'+ytTitle+'" videoid="'+ytVideo+'"]';

                                editor.insertContent( ytInserContent );
                            }
                        });
                    }
                }
            ]
        });
    });
})();