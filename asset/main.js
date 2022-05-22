let lang = getLanguage().then(data =>{
    d = data;
    let lang_selector = document.getElementById("lang");
    for(let i = 0; i < d.length; i++){
        if(USE_LANGUAGE_ID.includes(parseInt(d[i]['id']))){
            var op = new Option(d[i]['name'], d[i]['id'])
            lang_selector.appendChild(op);
        }
    }
    lang_selector.remove(0)
})

let theme_selector = document.getElementById("theme");
let ltm = CODEMIRROR_THEME
for(let k = 1; k <= Object.keys(ltm).length; k++){
    var op = new Option(ltm[k]['name'], ltm[k]['link'])
    theme_selector.appendChild(op)
}
document.getElementById("title_theme_selector").remove(0)

var editor = CodeMirror.fromTextArea(code, {
    lineNumbers: true,
    mode: "javascript",
    theme: "material",
    lineWrapping: true,
    autoCloseTags: true,
    autoCloseBrackets: true
})

function changeMode(ob) {
    var lan_id = ob.value
    console.log(lan_id)
    getMode(lan_id).then(data => {
        console.log(data)
        editor.setOption("mode", data)
    })
}
function changeTheme(ob){
    var theme_link = ob.value
    editor.setOption("theme", theme_link)
}

