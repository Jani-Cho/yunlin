
  // location
  var wss_pj_seat_town = document.querySelector('#wss_pj_seat_town');
  var wss_pj_seat_alley = document.querySelector('#wss_pj_seat_alley');
  var road = document.querySelector('#road');

  var alleylist = [
      {
          'area': '斗六市',
          'road': '九老爺段',
          'value': '九老爺段'
      }, {
          'area': '斗六市',
          'road': '八德段',
          'value': '八德段'
      }, {
          'area': '斗六市',
          'road': '十三段',
          'value': '十三段'
      }, {
          'area': '斗六市',
          'road': '三平段',
          'value': '三平段'
      }, {
          'area': '斗六市',
          'road': '大北勢段大北勢小段',
          'value': '大北勢段大北勢小段'
      }, {
          'area': '斗六市',
          'road': '大北勢段甲六埤小段',
          'value': '大北勢段甲六埤小段'
      }, {
          'area': '斗六市',
          'road': '大北勢段林子頭小段',
          'value': '大北勢段林子頭小段'
      }, {
          'area': '斗六市',
          'road': '大竹圍段',
          'value': '大竹圍段'
      }, {
          'area': '斗六市',
          'road': '大崙段大崙小段',
          'value': '大崙段大崙小段'
      }, {
          'area': '斗六市',
          'road': '大崙段茄苳腳小段',
          'value': '大崙段茄苳腳小段'
      }, {
          'area': '斗六市',
          'road': '大潭段大潭小段',
          'value': '大潭段大潭小段'
      }, {
          'area': '斗六市',
          'road': '大潭段社口小段',
          'value': '大潭段社口小段'
      }, {
          'area': '斗六市',
          'road': '中興段',
          'value': '中興段'
      }, {
          'area': '斗六市',
          'road': '內林段',
          'value': '內林段'
      }, {
          'area': '斗六市',
          'road': '公正段',
          'value': '公正段'
      }, {
          'area': '斗六市',
          'road': '斗六一段',
          'value': '斗六一段'
      }, {
          'area': '斗六市',
          'road': '斗六二段',
          'value': '斗六二段'
      }, {
          'area': '斗六市',
          'road': '斗六三段',
          'value': '斗六三段'
      }, {
          'area': '斗六市',
          'road': '斗六段',
          'value': '斗六段'
      }, {
          'area': '斗六市',
          'road': '水尾口段',
          'value': '水尾口段'
      }, {
          'area': '斗六市',
          'road': '牛埔段',
          'value': '牛埔段'
      }, {
          'area': '斗六市',
          'road': '北環段',
          'value': '北環段'
      }, {
          'area': '斗六市',
          'road': '半路段',
          'value': '半路段'
      }, {
          'area': '斗六市',
          'road': '正心段',
          'value': '正心段'
      }, {
          'area': '斗六市',
          'road': '石牛溪段',
          'value': '石牛溪段'
      }, {
          'area': '斗六市',
          'road': '石農段',
          'value': '石農段'
      }, {
          'area': '斗六市',
          'road': '石榴段',
          'value': '石榴段'
      }, {
          'area': '斗六市',
          'road': '石榴班段',
          'value': '石榴班段'
      }, {
          'area': '斗六市',
          'road': '光明段',
          'value': '光明段'
      }, {
          'area': '斗六市',
          'road': '光復段',
          'value': '光復段'
      }, {
          'area': '斗六市',
          'road': '竹圍子段',
          'value': '竹圍子段'
      }, {
          'area': '斗六市',
          'road': '竹頭段',
          'value': '竹頭段'
      }, {
          'area': '斗六市',
          'road': '自強段',
          'value': '自強段'
      }, {
          'area': '斗六市',
          'road': '西平段',
          'value': '西平段'
      }, {
          'area': '斗六市',
          'road': '秀才段',
          'value': '秀才段'
      }, {
          'area': '斗六市',
          'road': '府文段',
          'value': '府文段'
      }, {
          'area': '斗六市',
          'road': '明德段',
          'value': '明德段'
      }, {
          'area': '斗六市',
          'road': '林子頭段林子頭小段',
          'value': '林子頭段林子頭小段'
      }, {
          'area': '斗六市',
          'road': '林子頭段番子溝小段',
          'value': '林子頭段番子溝小段'
      }, {
          'area': '斗六市',
          'road': '林頭段',
          'value': '林頭段'
      }, {
          'area': '斗六市',
          'road': '虎溪段',
          'value': '虎溪段'
      }, {
          'area': '斗六市',
          'road': '長平段',
          'value': '長平段'
      }, {
          'area': '斗六市',
          'road': '長安段',
          'value': '長安段'
      }, {
          'area': '斗六市',
          'road': '保庄段',
          'value': '保庄段'
      }, {
          'area': '斗六市',
          'road': '保長廍段后庄子小段',
          'value': '保長廍段后庄子小段'
      }, {
          'area': '斗六市',
          'road': '保長廍段虎尾溪小段',
          'value': '保長廍段虎尾溪小段'
      }, {
          'area': '斗六市',
          'road': '保長廍段保長廍小段',
          'value': '保長廍段保長廍小段'
      }, {
          'area': '斗六市',
          'road': '咬狗北段',
          'value': '咬狗北段'
      }, {
          'area': '斗六市',
          'road': '咬狗庄段',
          'value': '咬狗庄段'
      }, {
          'area': '斗六市',
          'road': '咬狗段',
          'value': '咬狗段'
      }, {
          'area': '斗六市',
          'road': '建成段',
          'value': '建成段'
      }, {
          'area': '斗六市',
          'road': '後庄段',
          'value': '後庄段'
      }, {
          'area': '斗六市',
          'road': '科一段',
          'value': '科一段'
      }, {
          'area': '斗六市',
          'road': '科二段',
          'value': '科二段'
      }, {
          'area': '斗六市',
          'road': '科工段',
          'value': '科工段'
      }, {
          'area': '斗六市',
          'road': '科加段',
          'value': '科加段'
      }, {
          'area': '斗六市',
          'road': '貞寮段',
          'value': '貞寮段'
      }, {
          'area': '斗六市',
          'road': '重光東段',
          'value': '重光東段'
      }, {
          'area': '斗六市',
          'road': '重光段',
          'value': '重光段'
      }, {
          'area': '斗六市',
          'road': '海豐崙段朱丹灣小段',
          'value': '海豐崙段朱丹灣小段'
      }, {
          'area': '斗六市',
          'road': '海豐崙段海豐崙小段',
          'value': '海豐崙段海豐崙小段'
      }, {
          'area': '斗六市',
          'road': '秦寮段',
          'value': '秦寮段'
      }, {
          'area': '斗六市',
          'road': '埤口段',
          'value': '埤口段'
      }, {
          'area': '斗六市',
          'road': '崙仔段',
          'value': '崙仔段'
      }, {
          'area': '斗六市',
          'road': '崙北段',
          'value': '崙北段'
      }, {
          'area': '斗六市',
          'road': '崙南段',
          'value': '崙南段'
      }, {
          'area': '斗六市',
          'road': '梅林西段',
          'value': '梅林西段'
      }, {
          'area': '斗六市',
          'road': '梅林東段',
          'value': '梅林東段'
      }, {
          'area': '斗六市',
          'road': '梅南段',
          'value': '梅南段'
      }, {
          'area': '斗六市',
          'road': '湖山段',
          'value': '湖山段'
      }, {
          'area': '斗六市',
          'road': '菜公段',
          'value': '菜公段'
      }, {
          'area': '斗六市',
          'road': '雲林溪段',
          'value': '雲林溪段'
      }, {
          'area': '斗六市',
          'road': '黃厝段',
          'value': '黃厝段'
      }, {
          'area': '斗六市',
          'road': '新虎溪段',
          'value': '新虎溪段'
      }, {
          'area': '斗六市',
          'road': '新溪洲段',
          'value': '新溪洲段'
      }, {
          'area': '斗六市',
          'road': '溝子埧段瓦厝子小段',
          'value': '溝子埧段瓦厝子小段'
      }, {
          'area': '斗六市',
          'road': '溝子埧段柴裡小段',
          'value': '溝子埧段柴裡小段'
      }, {
          'area': '斗六市',
          'road': '溝子埧段溝子埧小段',
          'value': '溝子埧段溝子埧小段'
      }, {
          'area': '斗六市',
          'road': '溝垻段',
          'value': '溝垻段'
      }, {
          'area': '斗六市',
          'road': '溪洲段',
          'value': '溪洲段'
      }, {
          'area': '斗六市',
          'road': '萬年西段',
          'value': '萬年西段'
      }, {
          'area': '斗六市',
          'road': '萬年東段',
          'value': '萬年東段'
      }, {
          'area': '斗六市',
          'road': '嘉東段',
          'value': '嘉東段'
      }, {
          'area': '斗六市',
          'road': '榴中段',
          'value': '榴中段'
      }, {
          'area': '斗六市',
          'road': '榴北段',
          'value': '榴北段'
      }, {
          'area': '斗六市',
          'road': '劉厝段',
          'value': '劉厝段'
      }, {
          'area': '斗六市',
          'road': '龍潭段',
          'value': '龍潭段'
      }, {
          'area': '斗六市',
          'road': '鎮西段',
          'value': '鎮西段'
      },


      {
          'area': '古坑鄉',
          'road': '下崁腳段',
          'value': '下崁腳段'
      },

      {
          'area': '古坑鄉',
          'road': '下麻園段',
          'value': '下麻園段'
      },

      {
          'area': '古坑鄉',
          'road': '大湖口段',
          'value': '大湖口段'
      },

      {
          'area': '古坑鄉',
          'road': '大湖底段',
          'value': '大湖底段'
      },

      {
          'area': '古坑鄉',
          'road': '中洲段',
          'value': '中洲段'
      },

      {
          'area': '古坑鄉',
          'road': '水碓西段',
          'value': '水碓西段'
      },

      {
          'area': '古坑鄉',
          'road': '水碓東段',
          'value': '水碓東段'
      },

      {
          'area': '古坑鄉',
          'road': '水碓段',
          'value': '水碓段'
      },

      {
          'area': '古坑鄉',
          'road': '水碓新段',
          'value': '水碓新段'
      },

      {
          'area': '古坑鄉',
          'road': '古坑段古坑小段',
          'value': '古坑段古坑小段'
      },

      {
          'area': '古坑鄉',
          'road': '古坑段湳子小段',
          'value': '古坑段湳子小段'
      },

      {
          'area': '古坑鄉',
          'road': '永光段',
          'value': '永光段'
      },

      {
          'area': '古坑鄉',
          'road': '永昌段',
          'value': '永昌段'
      },

      {
          'area': '古坑鄉',
          'road': '永興段',
          'value': '永興段'
      },

      {
          'area': '古坑鄉',
          'road': '田心段',
          'value': '田心段'
      },

      {
          'area': '古坑鄉',
          'road': '石坑段',
          'value': '石坑段'
      },

      {
          'area': '古坑鄉',
          'road': '尖山坑段',
          'value': '尖山坑段'
      },

      {
          'area': '古坑鄉',
          'road': '西華段',
          'value': '西華段'
      },

      {
          'area': '古坑鄉',
          'road': '東和段',
          'value': '東和段'
      },

      {
          'area': '古坑鄉',
          'road': '東陽段',
          'value': '東陽段'
      },

      {
          'area': '古坑鄉',
          'road': '東興段',
          'value': '東興段'
      },

      {
          'area': '古坑鄉',
          'road': '青山段',
          'value': '青山段'
      },

      {
          'area': '古坑鄉',
          'road': '南昌段',
          'value': '南昌段'
      },

      {
          'area': '古坑鄉',
          'road': '建德段',
          'value': '建德段'
      },

      {
          'area': '古坑鄉',
          'road': '苦苓腳段',
          'value': '苦苓腳段'
      },

      {
          'area': '古坑鄉',
          'road': '崁腳段',
          'value': '崁腳段'
      },

      {
          'area': '古坑鄉',
          'road': '崁頭厝段',
          'value': '崁頭厝段'
      },

      {
          'area': '古坑鄉',
          'road': '草嶺段',
          'value': '草嶺段'
      },

      {
          'area': '古坑鄉',
          'road': '高林北段',
          'value': '高林北段'
      },

      {
          'area': '古坑鄉',
          'road': '高林南段',
          'value': '高林南段'
      },

      {
          'area': '古坑鄉',
          'road': '高厝林子頭段',
          'value': '高厝林子頭段'
      },

      {
          'area': '古坑鄉',
          'road': '荷苞段',
          'value': '荷苞段'
      },

      {
          'area': '古坑鄉',
          'road': '頂新庄段',
          'value': '頂新庄段'
      },

      {
          'area': '古坑鄉',
          'road': '麻園庄段',
          'value': '麻園庄段'
      },

      {
          'area': '古坑鄉',
          'road': '麻園段',
          'value': '麻園段'
      },

      {
          'area': '古坑鄉',
          'road': '棋山段',
          'value': '棋山段'
      },

      {
          'area': '古坑鄉',
          'road': '棋東段',
          'value': '棋東段'
      },

      {
          'area': '古坑鄉',
          'road': '棋盤段',
          'value': '棋盤段'
      },

      {
          'area': '古坑鄉',
          'road': '棋盤厝段',
          'value': '棋盤厝段'
      },

      {
          'area': '古坑鄉',
          'road': '湳子段',
          'value': '湳子段'
      },

      {
          'area': '古坑鄉',
          'road': '新生段',
          'value': '新生段'
      },

      {
          'area': '古坑鄉',
          'road': '新光段',
          'value': '新光段'
      },

      {
          'area': '古坑鄉',
          'road': '新庄段',
          'value': '新庄段'
      },

      {
          'area': '古坑鄉',
          'road': '新園段',
          'value': '新園段'
      },

      {
          'area': '古坑鄉',
          'road': '溪邊厝段',
          'value': '溪邊厝段'
      },

      {
          'area': '古坑鄉',
          'road': '樟湖段',
          'value': '樟湖段'
      },

      {
          'area': '林內鄉',
          'road': '九芎林段',
          'value': '九芎林段'
      }, {
          'area': '林內鄉',
          'road': '九芎南段',
          'value': '九芎南段'
      }, {
          'area': '林內鄉',
          'road': '九芎段',
          'value': '九芎段'
      }, {
          'area': '林內鄉',
          'road': '中山段',
          'value': '中山段'
      }, {
          'area': '林內鄉',
          'road': '仁愛段',
          'value': '仁愛段'
      }, {
          'area': '林內鄉',
          'road': '永昌段',
          'value': '永昌段'
      }, {
          'area': '林內鄉',
          'road': '成功段',
          'value': '成功段'
      }, {
          'area': '林內鄉',
          'road': '芎林段',
          'value': '芎林段'
      }, {
          'area': '林內鄉',
          'road': '芎蕉段',
          'value': '芎蕉段'
      }, {
          'area': '林內鄉',
          'road': '林內段',
          'value': '林內段'
      }, {
          'area': '林內鄉',
          'road': '長興段',
          'value': '長興段'
      }, {
          'area': '林內鄉',
          'road': '重興段',
          'value': '重興段'
      }, {
          'area': '林內鄉',
          'road': '烏麻段',
          'value': '烏麻段'
      }, {
          'area': '林內鄉',
          'road': '烏塗子段',
          'value': '烏塗子段'
      }, {
          'area': '林內鄉',
          'road': '烏塗段',
          'value': '烏塗段'
      }, {
          'area': '林內鄉',
          'road': '頂庄段',
          'value': '頂庄段'
      }, {
          'area': '林內鄉',
          'road': '湖山寮段',
          'value': '湖山寮段'
      }, {
          'area': '林內鄉',
          'road': '湖本段',
          'value': '湖本段'
      }, {
          'area': '林內鄉',
          'road': '進興段',
          'value': '進興段'
      }, {
          'area': '林內鄉',
          'road': '新興段',
          'value': '新興段'
      }, {
          'area': '林內鄉',
          'road': '寶隆段',
          'value': '寶隆段'
      }
  ]

  var alleyleng = alleylist.length;
  function addAlley(){
    var str2 = '<option value="" selected>請選擇路段</option>';
    for (i = 0; i < alleyleng; i++) {
        if (wss_pj_seat_town.value == alleylist[i].area) {

        //   wss_pj_seat_alley.disabled = false;
          if(road.value == alleylist[i].value){
            select = "selected"
          }else{
            select = ""
          }
          str2 += '<option value="' + alleylist[i].value + '" ' + select + ' >' + alleylist[i].road + '</option>';
          
        } else if (wss_pj_seat_town.value == '') {
            wss_pj_seat_town.value == ''
        //   wss_pj_seat_alley.disabled = true;
        }
    }
    wss_pj_seat_alley.innerHTML = str2;
  }

  addAlley();

  update = function (e) {
      var str2 = '<option value="" selected>請選擇路段</option>';
    
      for (i = 0; i < alleyleng; i++) {
          if (e.target.value == alleylist[i].area) {

            // wss_pj_seat_alley.disabled = false;
            str2 += '<option value="' + alleylist[i].value + '" >' + alleylist[i].road + '</option>';
            
          } else if (e.target.value == '無') {

            // wss_pj_seat_alley.disabled = true;
          }
      }
    
      wss_pj_seat_alley.innerHTML = str2;
      
      var wsv_pj_town = document.querySelector('#wsv_pj_town');
      var wsv_psh_town = document.querySelector('#wsv_psh_town');

      if (wsv_pj_town) { 
        wsv_pj_town.value = e.target.value;
      }
      if (wsv_psh_town) {
        wsv_psh_town.value = e.target.value;
    }

  }
    wss_pj_seat_town.addEventListener('change', update);

    update2 = function (e) {
        
        var wsv_pj_lot = document.querySelector('#wsv_pj_lot');
        if (wsv_pj_lot) {
            wsv_pj_lot.value = e.target.value;
        }
        
    }
    wss_pj_seat_alley.addEventListener('change', update2);

    // WSviolate
    var wsv_vio_area = document.querySelector('#wsv_vio_area');

    update3 = function (e) {
        
        var wsv_psh_area = document.querySelector('#wsv_psh_area');
        if (wsv_psh_area) {
            wsv_psh_area.value = e.target.value;
        }
        
    }
    if(wsv_vio_area){

        wsv_vio_area.addEventListener('change', update3);
    }