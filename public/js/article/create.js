/**
 * Created by jiyao on 2017/5/26.
 */

$('input[id=lefile]').change(function() {
    $('#photoCover').html($(this).val());
});
// Most options demonstrate the non-default behavior
let simplemde = new SimpleMDE({
    autofocus: true,
    autosave: {
        enabled: true,
        uniqueId: "editor01",
        delay: 1000,
    },
    blockStyles: {
        bold: "__",
        italic: "_"
    },
    element: document.getElementById("editor"),
    forceSync: true,
    hideIcons: ["guide", "heading"],
    indentWithTabs: false,
    initialValue: "Markdown...",
    insertTexts: {
        horizontalRule: ["", "\n\n-----\n\n"],
        image: ["![](http://", ")"],
        link: ["[", "](http://)"],
        table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
    },
    lineWrapping: false,
    parsingConfig: {
        allowAtxHeaderWithoutSpace: true,
        strikethrough: false,
        underscoresBreakWords: true,
    },
    placeholder: "placeholder",
    promptURLs: true,
    renderingConfig: {
        singleLineBreaks: false,
        codeSyntaxHighlighting: true,
    },
    shortcuts: {
        drawTable: "Cmd-Alt-T"
    },
    showIcons: ["code", "table"],
    spellChecker: false,
    status: false,
    status: ["autosave", "lines", "words", "cursor"], // Optional usage
    status: ["autosave", "lines", "words", "cursor", {
        className: "keystrokes",
        defaultValue: function(el) {
            this.keystrokes = 0;
            el.innerHTML = "0 Keystrokes";
        },
        onUpdate: function(el) {
            el.innerHTML = ++this.keystrokes + " Keystrokes";
        }
    }], // Another optional usage, with a custom status bar item that counts keystrokes
    styleSelectedText: false,
    tabSize: 4,
    //toolbar: flase,
    //toolbarTips: false,
});

/**
 * 标签
 */
let states = new Bloodhound({
    datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.word); },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    limit: 4,
    local: [
        { word: "AlabamaAlabamaAlabamaAlabama" },
        { word: "Alaska" },
        { word: "Arizona" },
        { word: "Arkansas" },
        { word: "California" },
        { word: "Colorado" }
    ]
});

states.initialize();

$('input.tagsinput').tagsinput({

});

function check_form() {
    let tags = $('input.tagsinput').tagsinput("items");
    $('#tagged').val(tags);
    return true;
}

// $('input.tagsinput').tagsinput('input').typeahead(null, {
//     name: 'states',
//     displayKey: 'word',
//     source: states.ttAdapter()
// });
