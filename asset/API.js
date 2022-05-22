const input = '100 200 1000'
const ex_output = '1000'

const BASE_URL = "https://judge-api.ctuit.club"
const X_AUTH_TOKEN = "f6583e60-b13b-4228-b554-2eb332ca64e9"
const X_AUTH_USER = "a1133bc6-a0f6-46bf-a2d8-6157418c6fe3"
const ABOUT_API = "/about/"
const SUBMISSION_API = "/submissions/"
const LANGUAGE_API = "/languages/"
const USE_LANGUAGE_ID = [50, 51, 54, 56, 60, 61, 62, 63, 64, 67, 68, 70, 71, 72, 73, 78, 79, 80, 88]
const RESULT_FORMATTED = {
    // 'status id' : 'formatted'
    1: '<i class="fas fa-spinner fa-spin"></i> Judging',
    2: '<i class="fas fa-spinner fa-spin"></i> Processing',
    3: '<b style="color:green" title="Accepted"><i class="fas fa-check"></i></b>',
    4: '<b style="color:red" title="Wrong Answer">WA</i></b>',
    5: '<b style="color:orange" title="Time Limit Exceeded">TLE</b>',
    6: '<b style="color:red" title="Compilation Error">CE</b>',
    7: '<b style="color:red" title="Runtime Error (SIGSEGV)">RE</b>',
    8: '<b style="color:red" title="Runtime Error (SIGXFSZ)">RE</b>',
    9: '<b style="color:red" title="Runtime Error (SIGFPE)">RE</b>',
    10: '<b style="color:red" title="Runtime Error (SIGABRT)">RE</b>',
    11: '<b style="color:red" title="Runtime Error (NZEC)">RE</b>',
    12: '<b style="color:red" title="Runtime Error (Other)">RE</b>',
    13: '<b style="color:red" title="Internal Error">IE</b>',
    14: '<b style="color:red" title="Exec Format Error">EFE</b>'
}
const CODEMIRROR_THEME = {
    1: {name: "Material", link: "material"},
    2: {name: "Material Ocean", link: "material-ocean"},
    3: {name: "Material Darker", link: "material-darker"},
    4: {name: "Monokai", link: "monokai"},
    5: {name: "Darcula", link: "darcula"},
    6: {name: "Dracula", link: "dracula"},
    7: {name: "Eclipse", link: "eclipse"},
    8: {name: "Neat", link: "neat"},
    9: {name: "Neo", link: "neo"},
    10: {name: "Twilight", link: "twilight"}
}
const CODEMIRROR_MODE = {
    '44':'',
    '45':'',
    '46':'',
    '47':'',
    '48':'clike',
    '49':'clike',
    '50':'clike',
    '51':'clike',
    '52':'clike',
    '53':'clike',
    '54':'clike',
    '55':'',
    '56':'d',
    '57':'',
    '58':'erlang',
    '59':'fortran',
    '60':'go',
    '61':'haskell',
    '62':'clike',
    '63':'javascript',
    '64':'lua',
    '65':'',
    '66':'octave',
    '67':'pascal',
    '68':'php',
    '69':'',
    '70':'python',
    '71':'python',
    '72':'ruby',
    '73':'rust',
    '74':'',
    '75':'clike',
    '76':'clike',
    '77':'cobol',
    '78':'',
    '79':'',
    '80':'r',
    '81':'clike',
    '82':'sql',
    '83':'swift',
    '84':'vb',
    '85':'perl',
    '86':'clojure',
    '87':'',
    '88':'groovy',
    '89':'',
    '90':'',
    '91':''
}

const LOGO_URL = {
    'c': 'https://upload.wikimedia.org/wikipedia/commons/archive/3/35/20190417225046%21The_C_Programming_Language_logo.svg',
    'cpp': 'https://upload.wikimedia.org/wikipedia/commons/1/18/ISO_C%2B%2B_Logo.svg',
    'python': 'https://upload.wikimedia.org/wikipedia/commons/c/c3/Python-logo-notext.svg',
    'java': 'https://upload.wikimedia.org/wikipedia/commons/4/4e/Duke-squeak-transparent-anti-aliased.png',
    'javascript': '',
    'go': ''

}

const fetchToJson = async(url, option) => {
    let res = await fetch(url, option)
    let jsn = await res.json();
    return jsn;
}

const getLanguage = async() => {
    let url = BASE_URL + LANGUAGE_API;
    let option = {
        method: 'GET',
        headers: {
            'X-Auth-Token': X_AUTH_TOKEN,
            'X-Auth-User': X_AUTH_USER
        }
    }
    let jd = await fetchToJson(url, option);
    return jd;
}

async function getMode(language_id) {
    var default_mode = 'javascript'
    var mode = default_mode
    if(language_id in CODEMIRROR_MODE) {
        mode = (CODEMIRROR_MODE[language_id] != '') ? CODEMIRROR_MODE[language_id] : default_mode
    }
    return mode
}

var smbtn = document.getElementById("submit_code")
smbtn.addEventListener("click", test)

function test() {
    smbtn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Prepairing...'

    var url = BASE_URL + SUBMISSION_API.slice(0, -1) + '?base64_encoded=true&wait=true&fields=*'
    var lang_id = parseInt(document.getElementById("lang").value)
    var code_content = btoa(editor.getValue())
    var inp = btoa(input)
    var exout = btoa(ex_output)

    var option = {
        method: 'POST',
        headers: {
            'Content-Type': "application/json",
            'X-Auth-Token': X_AUTH_TOKEN,
            'X-Auth-User': X_AUTH_USER
        },
        body: '{"language_id": ' + lang_id + ', "source_code": "' + code_content + '", "stdin": "' + inp + '","expected_output": "' + exout + '"}'
    }
    
    console.log("Done prepair.")
    smbtn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Submitting...'

    document.getElementById("submission-working").innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Đang nộp bài....'


    fetchToJson(url, option).then(res => {
        console.log(res)
        d = res
        document.getElementById("submission-working").innerHTML = RESULT_FORMATTED[d["status"]["id"]]
    })

    smbtn.innerHTML = 'Submit'
}