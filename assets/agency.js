//aggency

var user_agency = document.querySelector('#user_agency'); //單位
var user_team = document.querySelector('#user_team'); //分屬或組別
var user_internal = document.querySelector('#user_internal'); //內部單位

var teamlist = [
    {
        'agc': '雲林縣政府',
        'team': '水利處',
        'value': '水利處'
    },
    {
        'agc': '雲林縣政府',
        'team': '政風處',
        'value': '政風處'
    },
    {
        'agc': '雲林縣政府',
        'team': '主計處',
        'value': '主計處'
    },
    {
        'agc': '雲林縣政府',
        'team': '人事處',
        'value': '人事處'
    },
    {
        'agc': '雲林縣政府',
        'team': '計畫處',
        'value': '計畫處'
    },
    {
        'agc': '雲林縣政府',
        'team': '行政處',
        'value': '行政處'
    },
    {
        'agc': '雲林縣政府',
        'team': '文化觀光處',
        'value': '文化觀光處'
    },
    {
        'agc': '雲林縣政府',
        'team': '新聞處',
        'value': '新聞處'
    },
    {
        'agc': '雲林縣政府',
        'team': '地政處',
        'value': '地政處'
    },
    {
        'agc': '雲林縣政府',
        'team': '城鄉發展處',
        'value': '城鄉發展處'
    },
    {
        'agc': '雲林縣政府',
        'team': '勞動暨青年事務發展處',
        'value': '勞動暨青年事務發展處'
    },
    {
        'agc': '雲林縣政府',
        'team': '社會處',
        'value': '社會處'
    },
    {
        'agc': '雲林縣政府',
        'team': '農業處',
        'value': '農業處'
    },
    {
        'agc': '雲林縣政府',
        'team': '教育處',
        'value': '教育處'
    },
    {
        'agc': '雲林縣政府',
        'team': '工務處',
        'value': '工務處'
    },
    {
        'agc': '雲林縣政府',
        'team': '建設處',
        'value': '建設處'
    },
    {
        'agc': '雲林縣政府',
        'team': '財務處',
        'value': '財務處'
    },
    {
        'agc': '雲林縣政府',
        'team': '民政處',
        'value': '民政處'
    }
]
var internallist = [
    {
        'team': '水利工程科',
        'value': '水利工程科'
    },
    {
        'team': '水利行政科',
        'value': '水利行政科'
    },
    {
        'team': '防洪維護科',
        'value': '防洪維護科'
    },
    {
        'team': '下水道科',
        'value': '下水道科'
    },
    {
        'team': '水土保持科',
        'value': '水土保持科'
    }
]

// 分屬或組別
var teamleng = teamlist.length;
var internalleng = internallist.length;

update = function (e) {
    var team = '<option value="無">請選擇分署或組別</option>';
    var internal = '<option value="無">請選擇內部單位</option>';
    for (i = 0; i < teamleng; i++) {
        if (e.target.value == teamlist[i].agc) {

        // user_team.disabled = false;
        
        team += '<option value="' + teamlist[i].value + '" >' + teamlist[i].team + '</option>';
        
        } else if (e.target.value == '') {
            // user_team.disabled = true;
            // user_internal.disabled = true;
        }
    }

    user_team.innerHTML = team;
    user_internal.innerHTML = internal;
}

user_agency.addEventListener('change', update);

updateteam = function (e) {
    var internal = '<option value="無">請選擇內部單位</option>';
    if (e.target.value == "水利處") {
        // user_internal.disabled = false;
        for (i = 0; i < internalleng; i++) { 
            internal += '<option value="' + internallist[i].value + '" >' + internallist[i].team + '</option>';
        }
    } else {
        // user_internal.disabled = true;
     }

     user_internal.innerHTML = internal;
}


user_team.addEventListener('change', updateteam);

/*  編輯人員資料 */
var user_agency_v = document.getElementById('user_agency_v').value; 
var user_team_v = document.getElementById('user_team_v').value; 
var user_internal_v = document.getElementById('user_internal_v').value; 

if (user_agency_v !== "無") { 
    
    var all_team = '<option value="無">請選擇分署或組別</option>';

    for (i = 0; i < teamleng; i++) {
        if (teamlist[i].value == user_team_v) {
            selected = 'selected';
        } else { 
            selected = '';
        }
        all_team += '<option value="' + teamlist[i].value + '" ' + selected +'>' + teamlist[i].team + '</option>';
    }

    user_team.innerHTML = all_team;
}

if (user_team_v == "水利處") { 
    
    var all_internal = '<option value="無">請選擇內部單位</option>';
    // user_internal.disabled = false;
    for (i = 0; i < internalleng; i++) { 
        if (internallist[i].value == user_internal_v) {
            selected = 'selected';
        } else { 
            selected = '';
        }
        all_internal += '<option value="' + internallist[i].value + '" ' + selected + ' >' + internallist[i].team + '</option>';
    }
  

     user_internal.innerHTML = all_internal;
}else {
    // user_internal.disabled = true;
 }