import * as fs from 'fs/promises';

const versionApi = {
  read: () => fs.readFile('./src/version.json'),
  write: (str) => fs.writeFile('./src/version.json', str)
}
Date.prototype.format = function (fmt) {
  var o = {
    "M+": this.getMonth() + 1,                 //月份 
    "d+": this.getDate(),                    //日 
    "h+": this.getHours(),                   //小时 
    "m+": this.getMinutes(),                 //分 
    "s+": this.getSeconds(),                 //秒 
    "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
    "S": this.getMilliseconds()             //毫秒 
  };
  if (/(y+)/.test(fmt)) {
    fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
  }
  for (var k in o) {
    if (new RegExp("(" + k + ")").test(fmt)) {
      fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    }
  }
  return fmt;
}

// 修改版本
async function updateVersion() {
  try {
    const version = new Date().format("yyMMdd.hhmm");
    // 统一版本号，用package控制
    const versionJson = await versionApi.read()
    const versionData = JSON.parse(versionJson.toString())
    versionData.version = version

    // 写入版本文件
    await versionApi.write(JSON.stringify(versionData))

    console.log('最新版本号：' + version)
  } catch (e) {
    console.log(e)
    return new Error(e)
  }
}
updateVersion()
