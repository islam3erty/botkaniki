<?php  
      ob_start();
      $API_KEY = '933353857:AAHBqRA6UNKoF4qZBu7uXDLX9Bzo7s9tSkM';
      define('API_KEY',$API_KEY);
      function bot($method,$datas=[]){
      $url = "https://api.telegram.org/bot".API_KEY."/".$method;
      $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL,$url);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
      $res = curl_exec($ch);
      if(curl_error($ch)){
      var_dump(curl_error($ch));
      }else{
      return json_decode($res);
      }
      }
     $update = json_decode(file_get_contents('php://input'));
     $message = $update->message;
     $text = $update->message->text; 
     $chat_id = $update->message->chat->id; 
     $user = $update->message->from->username;
     $name = $update->message->from->first_name;
     $users = explode("\n", file_get_contents("users.txt"));
     $userdev = "wwww3";
     $userbot = "wwww3";
     $userch = "twsliqbot00";
     $admin = "679717827"; 
     if($text == "/admin" and $chat_id == $admin){ 
     bot('sendMessage',[
     'chat_id'=>$chat_id, 
     'text'=>"• اهلا بك في اوامر الادمن 🔝•", 
     'parse_mode'=>markdown, 
     'message_id'=>$message_id, 
     'reply_markup'=>json_encode([ 
     'inline_keyboard'=>[
     [['text'=>"اذاعة بـ توجية ?? ",'callback_data'=>"bcfwd"],['text'=>"اذاعة عادية ??",'callback_data'=>"bc"]],
     [['text'=>"الاحصائية ??",'callback_data'=>"users"]],
     ]])
     ]);
     }
     if($data == "users" and $chat_id == $admin){ 
     $user = count($users); 
     bot('editmessagetext',[ 
     'chat_id'=>$chat_id, 
     'text'=>"
ℹ️ احصائية البوت كتالي ⏬ •
╝ • المشتركين ~ $user
     ", 
     'message_id'=>$message_id, 
     'reply_markup'=>json_encode([ 
     'inline_keyboard'=>[
     [['text'=>"🔙",'callback_data'=>"🔙"]],
     ]])
     ]);
     }
     if($data == "bcfwd" and $chat_id == $admin){ 
     file_put_contents("unll.txt", "fwd"); 
     bot('editmessagetext',[ 
     'chat_id'=>$chat_id, 
     'text'=>"• ارسل المنشور ليتم نشرة بتوجية ☑️ • ", 
     'message_id'=>$message_id, 
     'reply_markup'=>json_encode([ 
     'inline_keyboard'=>[
     [['text'=>"🔙",'callback_data'=>"🔙"]],
     ]])
     ]);
     }
     if($message and !$data and file_get_contents("unll.txt") == "fwd" and $chat_id == $admin){ 
     for($h=0;$h<count($users);$h++){ 
     bot('forwardMessage',[ 
     'chat_id'=>$users[$h], 
     'from_chat_id'=>$chat_id, 
     'message_id'=>$message_id,
     ]); 
     }
     }
     if($data == "bc" and $chat_id == $admin){ 
     file_put_contents("unll.txt", "bc"); 
     bot('editmessagetext',[ 
     'chat_id'=>$chat_id, 
     'text'=>"• ارسل المنشور ليتم نشرة ☑️ •", 
     'message_id'=>$message_id, 
     'reply_markup'=>json_encode([ 
     'inline_keyboard'=>[
     [['text'=>"🔙",'callback_data'=>"🔙"]],
     ]])
     ]);
     }
     if($text and !$data and file_get_contents("unll.txt") == "bc" and $chat_id == $admin){ 
     for($h=0;$h<count($users);$h++){ 
     bot('sendMessage',[ 
     'chat_id'=>$users[$h], 
     'text'=>$text, 
     'parse_mode'=>markdown, 
     'disable_web_page_preview'=>true,
     ]); 
     }
     }
    if($text == "/start"){
    if(!in_array($chat_id, $users)){
    file_put_contents("users.txt", $chat_id."\n", FILE_APPEND);
		}
    bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"
• اهلا بك في بوت الزخرفه 🔱 •
• البوت الاول ؏ التلكرام 1⃣ •
• لعرض الاوامر ارسل الاوامر  •
• اذ لم تستطيع زخرفة اسمك 📇 •
",
   'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>"• حـسـاب الـمـطـور 👾 •",'url'=>"https://t.me/$userdev"]],
   [['text'=>"• لـ تـواصـل 🔰•",'url'=>"https://t.me/$userbot"]],
   [['text'=>"• ❤ تـابـع •",'url'=>"https://t.me/$userch"]],
   ]])
   ]);
   }
   if($text == "/help" or $text == "الاوامر"){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
• ﭑﮪﮪﮧﻟا ﺑﮧڪ يـﭑ 🔱 : [$name](https://t.me/$user)
  
ֆ • • • • • • • • • • • • • ֆ
• /h1 :- 📜 قسم الزخرفه العربيه •

• /h2 :- 🔠 قسم الزخرفه الاجنبيه •

• /h3 :- ♈️ قسم الاقواس •

• /h4 :- ❇️ قسم الزغرفه الاخرئ •
ֆ • • • • • • • • • • • • • ֆ
",
   'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>"• حـسـاب الـمـطـور 👾 •",'url'=>"https://t.me/$userdev"],['text'=>"• لـ تـواصـل 🔰•",'url'=>"https://t.me/$userbot"]],
   [['text'=>"• ❤ تـابـع •",'url'=>"https://t.me/$userch"]],
   ]])
   ]);
   }
   if($text == "/h1"){
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
• قـﺳم اﻟﺯخرﭬﮪهہ اﻟﻋربيهہ 📜 •
ֆ • • • • • • • • • • • • • ֆ
• /ze :- ⚡️ اوامر الزخرفه •

• /zj :- ✨ اوامر الزغرفه •

• /za :- 🌟 Ȋ اوامر زغرفه الـ •
ֆ • • • • • • • • • • • • • ֆ
",
   'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
   ]])
   ]);
   }
   if($text == "/ze"){
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
• ﭑﻭاﻣر ﭑﻟﺯخرﭬﮫهہ ⚡️ •
ֆ • • • • • • • • • • • • • ֆ
• A = ـۂ͜ާـہ
• B = ِـﮩ๋͜ﮧٰ۪ـہ
• C = ـٍُہۣۗـٍُہۣۗ
• D = ہٰ۫ـ❈ـّٰ̐ہٰٰ
• E = ـٰ۪ہﮩ๋͜ﮧ
• F = ـﮩﮨہٰٰہٰ
• G = ــۛৣ๋͜ـۛۛہ
• H = ــ๋͜ہٌٍۤـہٰٰٖ
• I = ـٌٍّﮩٍٍّٖﮩٍِّٗـٗۤہٌٰٖ
• J = ـًٍﮧٌٰٰٖﮧٰٖۤﮧْٰٖـ
• K = ـﮩ๋͜ﮧـ͜ާ
• L = ـہٰ❉ـّٰ̐ہٰٰ
• M = ﮧ௸ْْـّٰ̐ہٰٰ
• N = ۣۗﮧ✥ٍُـّٰ̐ہٰٰ
• O = ـﮧـّٰ̐ہٰٰ
• P = ٍـ௸ِـّٰ̐ہٰٰ
• Q = ـِّﮧْٰٖ₰ـّٰ̐ہٰٰ
• R = ـﮧ♚ـٰ̲̐ہ
• S = ٰٰـٌـৡـ
• T = ــ๘ٌ๋ـ
• U = ـ✮๋͜͡‏ٰ̲ـِـ
• V = ـٰٰٖـٰٰٖہـٰٰٖ͡ـہ
• W = ـٌـৡـ
• X = ــ๘ٌ๋ـ
• Y = ـ✮๋͜͡‏ٰ̲ـِـ
• Z = ـٰٰٖـٰٰٖہـٰٰٖ͡ـہ
• 0 = ـہـْـہٰٰٖ͡ۂـ
• 1 = ٌـﮧـۂ͜ާـ‏
• 2 = ہہًّ๋͜͡‏ِــًّ๋͜͡‏ـ
• 3 = ہٰﹻٰ۪۫ﹻٰٰﹻٰٰ
• 4 = ـہۧۖۖۗـ₪ۣۗـہـ
• 5 = ـــ๋͜͡ـہٰٰ
• 6 = ـــ๋͜͡ــ
• 7 = ـٰٰٰٰٰٰٰ̲ـہ
• 8 = ـٰٰٰٰٰٰٰ̲ــ
• 9 = ــ͡ـ̡ـ
• @ = ــ͡ـ̡ـہٰٰ
• / = ــۢ͜ـہٰ
• * = ـ̲̅̅ـــ
• + = ـ̲̅̅ــہٰ
• : = •
• ; = ֆ
• & = ໑
• _ = ♯
ֆ • • • • • • • • • • • • • ֆ
•طﺭيقـﮫهہ ﭑﻟاﺳتـﺨﮧدام 📝 •

• ﻣثـﭑﻝ 📌:- زخرفه فAك3ـتور
• ﺟواب 🔖:- فـۂ͜ާـہكہٰﹻٰ۪۫ﹻٰٰﹻٰٰـتور

• ويمكنك ايضا استخدام الارقام 
• و الرموز المذكوره فى الاعلى ⏫ •
ֆ • • • • • • • • • • • • • ֆ
",
   'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
   ]])
   ]);
   }
   $h = explode('زخرفه', $text);
   if($h[1]){
   $h = str_replace('A', 'ـۂ͜ާـہ', $h);
   $h = str_replace('B', 'ـﮩ๋͜ﮧٰ۪ـہ', $h);
   $h = str_replace('C', 'ـٍُہۣۗـٍُہۣۗ', $h);
   $h = str_replace('D', 'ہٰ۫ـ❈ـّٰ̐ہٰٰ', $h);
   $h = str_replace('E', 'ـٰ۪ہﮩ๋͜ﮧ', $h);
   $h = str_replace('F', 'ـﮩﮨہٰٰہٰ', $h);
   $h = str_replace('G', 'ــۛৣ๋͜ـۛۛہ', $h);
   $h = str_replace('H', 'ــ๋͜ہٌٍۤـہٰٰٖ', $h);
   $h = str_replace('I', 'ـٌٍّﮩٍٍّٖﮩٍِّٗـٗۤہٌٰٖ', $h);
   $h = str_replace('J', 'ـًٍﮧٌٰٰٖﮧٰٖۤﮧْٰٖـ', $h);
   $h = str_replace('K', 'ـﮩ๋͜ﮧـ͜ާ', $h);
   $h = str_replace('L', 'ـہٰ❉ـّٰ̐ہٰٰ', $h);
   $h = str_replace('M', 'ﮧ௸ْْـّٰ̐ہٰٰ', $h);
   $h = str_replace('N', 'ﮧ✥ٍُـّٰ̐ہٰٰ', $h);
   $h = str_replace('O', 'ـﮧـّٰ̐ہٰٰ', $h);
   $h = str_replace('P', 'ـ௸ِـّٰ̐ہٰٰ', $h);
   $h = str_replace('Q', 'ـِّﮧْٰٖ₰ـّٰ̐ہٰٰ', $h);
   $h = str_replace('R', 'ـﮧ♚ـٰ̲̐ہ', $h);
   $h = str_replace('S', 'ـٌـৡـ', $h);
   $h = str_replace('T', 'ــ๘ٌ๋ـ', $h);
   $h = str_replace('U', 'ـ✮๋͜͡‏ٰ̲ـِـ', $h);
   $h = str_replace('V', 'ـٰٰٖـٰٰٖہـٰٰٖ͡ـہ', $h);
   $h = str_replace('W', 'ـٌـৡـ', $h);
   $h = str_replace('X', 'ــ๘ٌ๋ـ', $h);
   $h = str_replace('Y', 'ـ✮๋͜͡‏ٰ̲ـِـ', $h);
   $h = str_replace('Z', 'ـٰٰٖـٰٰٖہـٰٰٖ͡ـہ', $h);
   $h = str_replace('0', 'ـہـْـہٰٰٖ͡ۂـ', $h);
   $h = str_replace('1', 'ـﮧـۂ͜ާـ‏', $h);
   $h = str_replace('2', 'ہہًّ๋͜͡‏ِــًّ๋͜͡‏ـ', $h);
   $h = str_replace('3', 'ہٰﹻٰ۪۫ﹻٰٰﹻٰٰ', $h);
   $h = str_replace('4', 'ـہۧۖۖۗـ₪ۣۗـہـ', $h);
   $h = str_replace('5', 'ـــ๋͜͡ـہٰٰ', $h);
   $h = str_replace('6', 'ـــ๋͜͡ــ', $h);
   $h = str_replace('7', 'ـٰٰٰٰٰٰٰ̲ـہ', $h);
   $h = str_replace('8', 'ـٰٰٰٰٰٰٰ̲ــ', $h);
   $h = str_replace('9', 'ــ͡ـ̡ـ', $h);
   $h = str_replace('@', 'ــ͡ـ̡ـہٰٰ', $h);
   $h = str_replace('/', 'ــۢ͜ـہٰ', $h);
   $h = str_replace('*', 'ـ̲̅̅ـــ', $h);
   $h = str_replace('+', 'ـ̲̅̅ــہٰ', $h);
   $h = str_replace(':', '•', $h);
   $h = str_replace(';', 'ֆ', $h);
   $h = str_replace('&', '໑', $h);
   $h = str_replace('_', '♯', $h);
    bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>$h[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "زخرفه"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• زخرفه فAك3ـتور",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/zj"){
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• ﭑﻭاﻣر ﭑﻟﺯﻏرﭬﮫهہ ✨ •
ֆ • • • • • • • • • • • • • ֆ

• 0 = ඊ
• 1 = טּ
• 2 = ୪
•3 = ໑
• 4 = ୭
• 5 = ૭
• 6 = ൭
• 7 = ؏
• 8 = ہ
• 9 = ﮧ
• * = •

• @ = ♯
• + = ֆ
• - = ـ
• : =  ̡
• ! =  ͡
• # =  ۢ͜
• / =  ๋͜͡
• _ =   ̲
• ; =   ̲̅̅

 ֆ • • • • • • • • • • • • • ֆ
•طﺭيقـﮫهہ ﭑﻟاﺳتـﺨﮧدام 📝 •

• ﻣثـﭑﻝ 📌:- زغرفه فك-تو2ر
• ﺟواب 🔖:- ف͒ہٰٰڪٰྀہٰٰـتَہَٰوِ୭ِٰر

• ﻣثـﭑﻝ 📌:- زغرفة فك-8ت-99و3ر
• ﺟواب 🔖:- فِٰكٍٰـہتّٰـﮧﮧوٍّ໑رِٰ

• ﻣثـﭑﻝ 📌:- الزغرفه * ف-99ك-/8تو3ر
• ﺟواب 🔖:- • فـﮧﮧكـ๋͜͡ہتو໑ر

• ﻣثـﭑﻝ 📌:- زغرفة ف-99ك-/8ت-و3ر
• ﺟواب 🔖:- فِْٰـﮧﮧكِْٰـ๋͜͡ہتِْٰـوِْٰ໑رِْٰ

• ويمكنك استخدام { - }
•  لتطويل الاسم ✳️ •

• ويمكنك ايضا استخدام الارقام 
• و الرموز المذكوره فى الاعلى ⏫ •
ֆ • • • • • • • • • • • • • ֆ",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    $k = explode("زغرفه", $text);
    if($k[1]){
	 $k = str_replace('ض', 'ضۜہٰٰ', $k);
	 $k = str_replace('ص', 'صۛہٰٰ', $k);
	 $k = str_replace('ث', 'ثہٰٰ', $k);
	 $k = str_replace('ق', 'قྀ̲ہٰٰٰ', $k);
	 $k = str_replace('ف', 'ف͒ہٰٰ', $k);
	 $k = str_replace('غ', 'غہٰٰ', $k);
	 $k = str_replace('ع', '؏ۤـہٰٰ', $k);
	 $k = str_replace('ه', 'ھہ', $k);
	 $k = str_replace('خ', 'خٰ̐ہ', $k);
	 $k = str_replace('ح', 'حہٰٰ', $k);
	 $k = str_replace('ج', 'جْۧ', $k);
	 $k = str_replace('ش', 'شِٰہٰٰ', $k);
	 $k = str_replace('س', 'سٰٰٓ', $k);
	 $k = str_replace('ي', 'يِٰہ', $k);
	 $k = str_replace('ب', 'بّہ', $k);
	 $k = str_replace('ل', 'ل', $k);
	 $k = str_replace('ا', 'آ', $k);
	 $k = str_replace('ت', 'تَہَٰ', $k);
	 $k = str_replace('ن', 'نَِٰہٰ', $k);
	 $k = str_replace('م', 'مٰ̲ہ', $k);
	 $k = str_replace('ك', 'ڪٰྀہٰٰٖ', $k);
	 $k = str_replace('ط', 'طۨہٰٰ', $k);
	 $k = str_replace('ذ', 'ذِ', $k);
	 $k = str_replace('ء', 'ء', $k);
	 $k = str_replace('ؤ', 'ؤ', $k);
	 $k = str_replace('ر', 'ر', $k);
	 $k = str_replace('ى', 'ى', $k);
	 $k = str_replace('ة', 'ة', $k);
	 $k = str_replace('و', 'وِ', $k);
	 $k = str_replace('ز', 'زَ', $k);
	 $k = str_replace('ظ', 'ظۗہٰٰ', $k);
	 $k = str_replace('د', 'د', $k);
	 $k = str_replace('0', 'ඊ', $k);
	 $k = str_replace('1', 'טּ', $k);
	 $k = str_replace('2', '୪', $k);
	 $k = str_replace('3', '໑', $k);
	 $k = str_replace('4', '୭', $k);
	 $k = str_replace('5', '૭', $k);
	 $k = str_replace('6', '൭', $k);
	 $k = str_replace('7', '؏', $k);
	 $k = str_replace('8', 'ہ', $k);
	 $k = str_replace('9', 'ﮧ', $k);
	 $k = str_replace('*', '•', $k);
	 $k = str_replace('@', '♯', $k);
	 $k = str_replace('+', 'ֆ', $k);
   $k = str_replace('-', 'ـ', $k);
	 $k = str_replace(':', ' ̡', $k);
	 $k = str_replace('!', ' ͡', $k);
	 $k = str_replace('#', ' ۢ͜', $k);
	 $k = str_replace('/', ' ๋͜͡', $k);
	 $k = str_replace('_', '  ̲', $k);
	 $k = str_replace(';', '  ̲̅̅', $k);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$k[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "زغرفة"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• زغرفه ف-99ك-/8ت-و3ر",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/za"){
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
• ﭑﻭاﻣر ﺯﻏرﭬﮫهہ  اﻟȊ 🌟 •
ֆ • • • • • • • • • • • • • ֆ

• ا = Ȋ
• ب = ɹ̣
• ت = ɹ̈
• ث = ɹ̈̇
• ج = ᓗฺ
• ح = ᓗ
• خ = ᓘ
• د = כ
• ذ = כ֗
• ر = ȷ
• ز = j
• س = ɹɹɹ
• ش = ɹɹ̈̇ɹ
• ص = ᘗ
• ض = ᘞ̇
• ط = Ь
• ظ = Ь̇
• ع = ϛ
• غ = ϛ۬
• ف = ᓅ
• ق = ᓆ
• ك = 丂
• ل = ⅃

• م = ᓄ
• ن = ᓢ
• ه = බ
• و = g
• ي = ɹ̤
• A = ʟɾ
• B = ʟɾʅ
• C = Ⴢ̤
• D = ʟ̤ɾʅ
• E = ם
• F = ᘓɹ̇
• G = ᓚɹ̇
• H = ρ
• I = ᓚ⅃
• J = ᓚ̐ᒧ
• K = ᘓᓆ
• L = ᓚᓆ
• M = ᘓᓅ
• N = ᓈ
• O = ᓚᓅ
• P = ƹ̇
• Q = ƹ
• R = ᘞ̇‿
• S = ᓚᘞ̇
• T = ᘗ‿
• U = ᓚᘗ
• V = ɹɹ̈̇ɹ‿
• W = ᓚɹɹ̈̇ɹ

• X = ᓚɹɹɹ
• Y = ཌʹ
• Z = ཌ֑
• 0 = ᘓɹ̈̇
• 1 = ʟɹ̈̇
• 2 = ᓚɹ̈̇
• 3 = ɑ̈
• 4 = ʟɹ̈
• 5 = ᘓɹ̣
• 6 = ʟɹ̣
• 7 = ᓚɹ̣
• 8 = lɺ

• 9 = ཌ
• - = ᎗
• _ = ɹ̇
• * = ܩ
• @ = Ꭷ
• + = ̣ב
• ! =  ۬ב
• / = ב

ֆ • • • • • • • • • • • • • ֆ
•طﺭيقـﮫهہ ﭑﻟاﺳتـﺨﮧدام 📝 •
• ﻣثـﭑﻝ 📌:-
• /zt روت-كف
• ﺟواب 🔖:-
• ȷgɹ̈᎗丂ᓅ

• يجب عكس اسمك لتتم
• الزخرفه بشكل افضل ✅ • 

• ﻣثـﭑﻝ 📌:- فكتور - روتكف

• يمكنك استخدام الاحرف الاجنبيه
• لوضع الحروف التي تكون في النهايه
• ﻣثـﭑﻝ 📌:-
• /zt Dدوم 
• ﺟواب 🔖:-
• ʟ̤ɾʅכgᓄ


• ويمكنك ايضا استخدام الارقام 
• و الرموز المذكوره فى الاعلى ⏫ •
ֆ • • • • • • • • • • • • • ֆ
",
   'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
   ]])
   ]);
   }
    $l = explode("/zt", $text);
    if($l[1]){
	 $l = str_replace('ا', 'Ȋ', $l);
	 $l = str_replace('ب', 'ɹ̣', $l);
	 $l = str_replace('ت', 'ɹ̈', $l);
	 $l = str_replace('ث', 'ɹ̈̇', $l);
	 $l = str_replace('ج', 'ᓗฺ', $l);
	 $l = str_replace('ح', 'ᓗ', $l);
	 $l = str_replace('خ', 'ᓘ', $l);
	 $l = str_replace('د', 'כ', $l);
	 $l = str_replace('ذ', 'כ֗', $l);
	 $l = str_replace('ر', 'ȷ', $l);
	 $l = str_replace('ز', 'j', $l);
	 $l = str_replace('س', 'ɹɹɹ', $l);
	 $l = str_replace('ش', 'ɹɹ̈̇ɹ', $l);
	 $l = str_replace('ص', 'ᘗ', $l);
	 $l = str_replace('ض', 'ᘞ̇', $l);
	 $l = str_replace('ط', 'Ь', $l);
	 $l = str_replace('ظ', 'Ь̇', $l);
	 $l = str_replace('ع', 'ϛ', $l);
	 $l = str_replace('غ', 'ϛ۬', $l);
	 $l = str_replace('ف', 'ᓅ', $l);
	 $l = str_replace('ق', 'ᓆ', $l);
	 $l = str_replace('ك', '丂', $l);
	 $l = str_replace('ل', '⅃', $l);
	 $l = str_replace('م', 'ᓄ', $l);
	 $l = str_replace('ن', 'ᓢ', $l);
	 $l = str_replace('ه', 'බ', $l);
	 $l = str_replace('و', 'g', $l);
	 $l = str_replace('ي', 'ɹ̤', $l);
	 $l = str_replace('A', 'ʟɾ', $l);
	 $l = str_replace('B', 'ʟɾʅ', $l);
	 $l = str_replace('C', 'Ⴢ̤', $l);
	 $l = str_replace('D', 'ʟ̤ɾʅ', $l);
	 $l = str_replace('E', 'ם', $l);
	 $l = str_replace('F', 'ᘓɹ̇', $l);
	 $l = str_replace('G', 'ᓚɹ̇', $l);
	 $l = str_replace('H', 'ρ', $l);
	 $l = str_replace('I', 'ᓚ⅃', $l);
	 $l = str_replace('J', 'ᓚ̐ᒧ', $l);
	 $l = str_replace('K', 'ᘓᓆ', $l);
	 $l = str_replace('L', 'ᓚᓆ', $l);
	 $l = str_replace('M', 'ᘓᓅ', $l);
	 $l = str_replace('N', 'ᓈ', $l);
	 $l = str_replace('O', 'ᓚᓅ', $l);
	 $l = str_replace('P', 'ƹ̇', $l);
	 $l = str_replace('Q', 'ƹ', $l);
	 $l = str_replace('R', 'ᘞ̇‿', $l);
	 $l = str_replace('S', 'ᓚᘞ̇', $l);
	 $l = str_replace('T', 'ᘗ‿', $l);
	 $l = str_replace('U', 'ᓚᘗ', $l);
	 $l = str_replace('V', 'ɹɹ̈̇ɹ‿', $l);
	 $l = str_replace('W', 'ᓚɹɹ̈̇ɹ', $l);
	 $l = str_replace('X', 'ᓚɹɹɹ', $l);
	 $l = str_replace('Y', 'ཌʹ', $l);
	 $l = str_replace('Z', 'ཌ֑', $l);
	 $l = str_replace('0', 'ᘓɹ̈̇', $l);
	 $l = str_replace('1', 'ʟɹ̈̇', $l);
	 $l = str_replace('2', 'ᓚɹ̈̇', $l);
	 $l = str_replace('3', 'ɑ̈', $l);
	 $l = str_replace('4', 'ʟɹ̈', $l);
	 $l = str_replace('5', 'ᘓɹ̣', $l);
	 $l = str_replace('6', 'ʟɹ̣', $l);
	 $l = str_replace('7', 'ᓚɹ̣', $l);
	 $l = str_replace('8', 'lɺ', $l);
	 $l = str_replace('9', 'ཌ', $l);
	 $l = str_replace('-', '᎗', $l);
	 $l = str_replace('_', 'ɹ̇', $l);
	 $l = str_replace('*', 'ܩ', $l);
	 $l = str_replace('@', 'Ꭷ', $l);
	 $l = str_replace('+', 'ב', $l);
	 $l = str_replace('!', ' ۬ב', $l);
	 $l = str_replace('/', 'ב', $l);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$l[1],
   'reply_markup'=>json_encode([
   'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   if($text == "/zt"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /zt Dدوم ",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   if($text == "/h2"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• ﭑﻭاﻣر ﺯﻏرﭬﮫهہ ﭑϪﻟاﻧڪلـﺵ ☄ •
ֆ • • • • • • • • • • • • • ֆ

• /z1 VICTOR
• ᐯᓰᑕ√〇ᖇ

• /z2 VICTOR
• vιcтσя

• /z3 VICTOR
• ᵛᶤᶜᵗᵒʳ

• /z4 VICTOR
• Vįćťðя

• /z5 VICTOR
• VĪĈƚØR

• /z6 VICTOR
• ƔɪㄈŤØ尺

• /z7 VICTOR
• ƲICƬΘΓ

• /z8 VICTOR
• ЏﾉζｲԾ尺

• /z9 VICTOR
• ⱴเςt๏г

• /z10 VICTOR
• ౮ɿ८੮૦Ր

• /z11 VICTOR
• ѴịƇͲỖⱤ

• /z12 VICTOR
• ᴠɪᴄᴛᴏʀ

• /z13 VICTOR
• ＶＩСＴＯＲ

• /z14 VICTOR
• ṼłϾ₮ФЯ

• /z15 VICTOR
• 🇻 🇮 🇨 🇹 🇴 🇷

• /z16 VICTOR
•🇻 •🇮 •🇨 •🇹 •🇴 •🇷
ֆ • • • • • • • • • • • • • ֆ
•طﺭيقـﮫهہ ﭑﻟاﺳتـﺨﮧدام 📝 •
• ﻣثـﭑﻝ 📌:-
• /z12 VICTOR
• ﺟواب 🔖:-
• ᴠɪᴄᴛᴏʀ",
   'reply_markup'=>json_encode([
   'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    $y0 = explode("/z1", $text);
    if($y0[1]){
	 $y0 = str_replace('q', 'Ⴓ' , $y0);
  	 $y0 = str_replace('w', 'ᗯ' , $y0);
	 $y0 = str_replace('e', 'ᕮ' , $y0);
  	 $y0 = str_replace('r', 'ᖇ' , $y0);
	 $y0 = str_replace('t', 'ͳ' , $y0);
  	 $y0 = str_replace('y', 'ϒ' , $y0);
	 $y0 = str_replace('u', 'ᘮ' , $y0);
  	 $y0 = str_replace('i', 'ᓰ' , $y0);
	 $y0 = str_replace('o', '〇' , $y0);
  	 $y0 = str_replace('p', 'ᖘ' , $y0);
	 $y0 = str_replace('a', 'ᗩ' , $y0);
  	 $y0 = str_replace('s', 'ᔕ' , $y0);
	 $y0 = str_replace('d', 'ᗪ' , $y0);
  	 $y0 = str_replace('f', 'Բ' , $y0);
	 $y0 = str_replace('g', 'ᘐ' , $y0);
  	 $y0 = str_replace('h', 'ᕼ' , $y0);
	 $y0 = str_replace('j', 'ᒎ' , $y0);
  	 $y0 = str_replace('k', 'Ḱ' , $y0);
	 $y0 = str_replace('l', 'ᒪ' , $y0);
  	 $y0 = str_replace('z', 'Ꙁ' , $y0);
	 $y0 = str_replace('x', 'Ꮖ' , $y0);
  	 $y0 = str_replace('c', 'ᑕ' , $y0);
	 $y0 = str_replace('v', 'ᐯ' , $y0);
  	 $y0 = str_replace('b', 'ᙖ' , $y0);
  	 $y0 = str_replace('n', 'ᘉ' , $y0);
	 $y0 = str_replace('m', 'ᙢ' , $y0);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z1"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z1 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    $y1 = explode("/z2", $text);
    if($y1[1]){
	 $y1 = str_replace('q', 'q' , $y1);
  	 $y1 = str_replace('w', 'ω' , $y1);
	 $y1 = str_replace('e', 'ε' , $y1);
  	 $y1 = str_replace('r', 'я' , $y1);
	 $y1 = str_replace('t', 'т' , $y1);
  	 $y1 = str_replace('y', 'ү' , $y1);
	 $y1 = str_replace('u', 'υ' , $y1);
  	 $y1 = str_replace('i', 'ι' , $y1);
	 $y1 = str_replace('o', 'σ' , $y1);
  	 $y1 = str_replace('p', 'ρ' , $y1);
	 $y1 = str_replace('a', 'α' , $y1);
  	 $y1 = str_replace('s', 's' , $y1);
	 $y1 = str_replace('d', '∂' , $y1);
  	 $y1 = str_replace('f', 'ғ' , $y1);
	 $y1 = str_replace('g', 'g' , $y1);
  	 $y1 = str_replace('h', 'н' , $y1);
	 $y1 = str_replace('j', 'נ' , $y1);
  	 $y1 = str_replace('k', 'к' , $y1);
	 $y1 = str_replace('l', 'ℓ' , $y1);
  	 $y1 = str_replace('z', 'z' , $y1);
	 $y1 = str_replace('x', 'x' , $y1);
  	 $y1 = str_replace('c', 'c' , $y1);
	 $y1 = str_replace('v', 'v' , $y1);
  	 $y1 = str_replace('b', 'в' , $y1);
  	 $y1 = str_replace('n', 'η' , $y1);
	 $y1 = str_replace('m', 'м' , $y1);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y1[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z2"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z2 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    $y2 = explode("/z3", $text);
    if($y2[1]){
	 $y2 = str_replace('q', 'ᵠ' , $y2);
  	 $y2 = str_replace('w', 'ʷ' , $y2);
	 $y2 = str_replace('e', 'ᵉ' , $y2);
  	 $y2 = str_replace('r', 'ʳ' , $y2);
	 $y2 = str_replace('t', 'ᵗ' , $y2);
  	 $y2 = str_replace('y', 'ʸ' , $y2);
	 $y2 = str_replace('u', 'ᵘ' , $y2);
  	 $y2 = str_replace('i', 'ᶤ' , $y2);
	 $y2 = str_replace('o', 'ᵒ' , $y2);
  	 $y2 = str_replace('p', 'ᵖ' , $y2);
	 $y2 = str_replace('a', 'ᵃ' , $y2);
  	 $y2 = str_replace('s', 'ˢ' , $y2);
	 $y2 = str_replace('d', 'ᵈ' , $y2);
  	 $y2 = str_replace('f', 'ᶠ' , $y2);
	 $y2 = str_replace('g', 'ᵍ' , $y2);
  	 $y2 = str_replace('h', 'ʰ' , $y2);
	 $y2 = str_replace('j', 'ʲ' , $y2);
  	 $y2 = str_replace('k', 'ᵏ' , $y2);
	 $y2 = str_replace('l', 'ˡ' , $y2);
  	 $y2 = str_replace('z', 'ᶻ' , $y2);
	 $y2 = str_replace('x', 'ˣ' , $y2);
  	 $y2 = str_replace('c', 'ᶜ' , $y2);
	 $y2 = str_replace('v', 'ᵛ' , $y2);
  	 $y2 = str_replace('b', 'ᵇ' , $y2);
  	 $y2 = str_replace('n', 'ᶰ' , $y2);
	 $y2 = str_replace('m', 'ᵐ' , $y2);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y2[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z3"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z3 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
	$y3 = explode("/z4", $text);
    if($y3[1]){
	 $y3 = str_replace('q', 'Θ' , $y3);
  	 $y3 = str_replace('w', 'ẁ' , $y3);
	 $y3 = str_replace('e', 'ë' , $y3);
  	 $y3 = str_replace('r', 'я' , $y3);
	 $y3 = str_replace('t', 'ť' , $y3);
  	 $y3 = str_replace('y', 'y' , $y3);
	 $y3 = str_replace('u', 'ע' , $y3);
  	 $y3 = str_replace('i', 'į' , $y3);
	 $y3 = str_replace('o', 'ð' , $y3);
  	 $y3 = str_replace('p', 'ρ' , $y3);
	 $y3 = str_replace('a', 'à' , $y3);
  	 $y3 = str_replace('s', 'ś' , $y3);
	 $y3 = str_replace('d', 'ď' , $y3);
  	 $y3 = str_replace('f', '∫' , $y3);
	 $y3 = str_replace('g', 'ĝ' , $y3);
  	 $y3 = str_replace('h', 'ŋ' , $y3);
	 $y3 = str_replace('j', 'Ј' , $y3);
  	 $y3 = str_replace('k', 'қ' , $y3);
	 $y3 = str_replace('l', 'Ŀ' , $y3);
  	 $y3 = str_replace('z', 'ź' , $y3);
	 $y3 = str_replace('x', 'א' , $y3);
  	 $y3 = str_replace('c', 'ć' , $y3);
	 $y3 = str_replace('v', 'V' , $y3);
  	 $y3 = str_replace('b', 'Ђ' , $y3);
  	 $y3 = str_replace('n', 'ŋ' , $y3);
	 $y3 = str_replace('m', 'm' , $y3);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y3[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z4"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z4 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
	$y4 = explode("/z5", $text);
    if($y4[1]){
	 $y4 = str_replace('q', 'Ҩ' , $y4);
  	 $y4 = str_replace('w', 'Щ' , $y4);
	 $y4 = str_replace('e', 'Є' , $y4);
  	 $y4 = str_replace('r', 'R' , $y4);
	 $y4 = str_replace('t', 'ƚ' , $y4);
  	 $y4 = str_replace('y', '￥' , $y4);
	 $y4 = str_replace('u', 'Ц' , $y4);
  	 $y4 = str_replace('i', 'Ī' , $y4);
	 $y4 = str_replace('o', 'Ø' , $y4);
  	 $y4 = str_replace('p', 'P' , $y4);
	 $y4 = str_replace('a', 'Â' , $y4);
  	 $y4 = str_replace('s', '$' , $y4);
	 $y4 = str_replace('d', 'Ð' , $y4);
  	 $y4 = str_replace('f', 'Ŧ' , $y4);
	 $y4 = str_replace('g', 'Ǥ' , $y4);
  	 $y4 = str_replace('h', 'Ħ' , $y4);
	 $y4 = str_replace('j', 'ʖ' , $y4);
  	 $y4 = str_replace('k', 'Қ' , $y4);
	 $y4 = str_replace('l', 'Ŀ' , $y4);
  	 $y4 = str_replace('z', 'Ẕ' , $y4);
	 $y4 = str_replace('x', 'X' , $y4);
  	 $y4 = str_replace('c', 'Ĉ' , $y4);
	 $y4 = str_replace('v', 'V' , $y4);
  	 $y4 = str_replace('b', 'ß' , $y4);
  	 $y4 = str_replace('n', 'И' , $y4);
	 $y4 = str_replace('m', 'ⴅ' , $y4);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y4[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z5"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z5 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
	 $y5 = explode("/z6", $text);
    if($y5[1]){
	 $y5 = str_replace('q', 'Ҩ' , $y5);
  	 $y5 = str_replace('w', 'Ɯ' , $y5);
	 $y5 = str_replace('e', 'Ɛ' , $y5);
  	 $y5 = str_replace('r', '尺' , $y5);
	 $y5 = str_replace('t', 'Ť' , $y5);
  	 $y5 = str_replace('y', 'Ϥ' , $y5);
	 $y5 = str_replace('u', 'Ц' , $y5);
  	 $y5 = str_replace('i', 'ɪ' , $y5);
	 $y5 = str_replace('o', 'Ø' , $y5);
  	 $y5 = str_replace('p', 'þ' , $y5);
	 $y5 = str_replace('a', 'Λ' , $y5);
  	 $y5 = str_replace('s', 'ら' , $y5);
	 $y5 = str_replace('d', 'Ð' , $y5);
  	 $y5 = str_replace('f', 'F' , $y5);
	 $y5 = str_replace('g', 'Ɠ' , $y5);
  	 $y5 = str_replace('h', 'н' , $y5);
	 $y5 = str_replace('j', 'ﾌ' , $y5);
  	 $y5 = str_replace('k', 'Қ' , $y5);
	 $y5 = str_replace('l', 'Ł' , $y5);
  	 $y5 = str_replace('z', 'Ẕ' , $y5);
	 $y5 = str_replace('x', 'χ' , $y5);
  	 $y5 = str_replace('c', 'ㄈ' , $y5);
	 $y5 = str_replace('v', 'Ɣ' , $y5);
  	 $y5 = str_replace('b', 'Ϧ' , $y5);
  	 $y5 = str_replace('n', 'Л' , $y5);
	 $y5 = str_replace('m', '௱' , $y5);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y5[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z6"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z6 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   $y6 = explode("/z7", $text);
    if($y6[1]){
	 $y6 = str_replace('q', 'Ⴓ' , $y6);
  	 $y6 = str_replace('w', 'Ш' , $y6);
	 $y6 = str_replace('e', 'Σ' , $y6);
  	 $y6 = str_replace('r', 'Γ' , $y6);
	 $y6 = str_replace('t', 'Ƭ' , $y6);
  	 $y6 = str_replace('y', 'Ψ' , $y6);
	 $y6 = str_replace('u', 'Ʊ' , $y6);
  	 $y6 = str_replace('i', 'I' , $y6);
	 $y6 = str_replace('o', 'Θ' , $y6);
  	 $y6 = str_replace('p', 'Ƥ' , $y6);
	 $y6 = str_replace('a', 'Δ' , $y6);
  	 $y6 = str_replace('s', 'Ѕ' , $y6);
	 $y6 = str_replace('d', 'D' , $y6);
  	 $y6 = str_replace('f', 'F' , $y6);
	 $y6 = str_replace('g', 'G' , $y6);
  	 $y6 = str_replace('h', 'H' , $y6);
	 $y6 = str_replace('j', 'J' , $y6);
  	 $y6 = str_replace('k', 'Ƙ' , $y6);
	 $y6 = str_replace('l', 'L' , $y6);
  	 $y6 = str_replace('z', 'Z' , $y6);
	 $y6 = str_replace('x', 'Ж' , $y6);
  	 $y6 = str_replace('c', 'C' , $y6);
	 $y6 = str_replace('v', 'Ʋ' , $y6);
  	 $y6 = str_replace('b', 'Ɓ' , $y6);
  	 $y6 = str_replace('n', '∏' , $y6);
	 $y6 = str_replace('m', 'Μ' , $y6);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y6[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z7"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z7 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
	$y7 = explode("/z8", $text);
    if($y7[1]){
	 $y7 = str_replace('q', 'Q' , $y7);
  	 $y7 = str_replace('w', 'Щ' , $y7);
	 $y7 = str_replace('e', '乇' , $y7);
  	 $y7 = str_replace('r', '尺' , $y7);
	 $y7 = str_replace('t', 'ｲ' , $y7);
  	 $y7 = str_replace('y', 'ﾘ' , $y7);
	 $y7 = str_replace('u', 'Ц' , $y7);
  	 $y7 = str_replace('i', 'ﾉ' , $y7);
	 $y7 = str_replace('o', 'Ծ' , $y7);
  	 $y7 = str_replace('p', 'ｱ' , $y7);
	 $y7 = str_replace('a', 'ﾑ' , $y7);
  	 $y7 = str_replace('s', '丂' , $y7);
	 $y7 = str_replace('d', 'Ð' , $y7);
  	 $y7 = str_replace('f', 'ｷ' , $y7);
	 $y7 = str_replace('g', 'Ǥ' , $y7);
  	 $y7 = str_replace('h', 'ん' , $y7);
	 $y7 = str_replace('j', 'ﾌ' , $y7);
  	 $y7 = str_replace('k', 'ズ' , $y7);
	 $y7 = str_replace('l', 'ﾚ' , $y7);
  	 $y7 = str_replace('z', '乙' , $y7);
	 $y7 = str_replace('x', 'ﾒ' , $y7);
  	 $y7 = str_replace('c', 'ζ' , $y7);
	 $y7 = str_replace('v', 'Џ' , $y7);
  	 $y7 = str_replace('b', '乃' , $y7);
  	 $y7 = str_replace('n', '刀' , $y7);
	 $y7 = str_replace('m', 'ᄊ' , $y7);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y7[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z8"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z8 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    $y8 = explode("/z9", $text);
    if($y8[1]){
	 $y8 = str_replace('q', 'ợ' , $y8);
  	 $y8 = str_replace('w', 'ฬ' , $y8);
	 $y8 = str_replace('e', 'є' , $y8);
  	 $y8 = str_replace('r', 'г' , $y8);
	 $y8 = str_replace('t', 't' , $y8);
  	 $y8 = str_replace('y', 'ץ' , $y8);
	 $y8 = str_replace('u', 'ย' , $y8);
  	 $y8 = str_replace('i', 'เ' , $y8);
	 $y8 = str_replace('o', '๏' , $y8);
  	 $y8 = str_replace('p', 'թ' , $y8);
	 $y8 = str_replace('a', 'ค' , $y8);
  	 $y8 = str_replace('s', 'ร' , $y8);
	 $y8 = str_replace('d', '๔' , $y8);
  	 $y8 = str_replace('f', 'Ŧ' , $y8);
	 $y8 = str_replace('g', 'ɠ' , $y8);
  	 $y8 = str_replace('h', 'ђ' , $y8);
	 $y8 = str_replace('j', 'ן' , $y8);
  	 $y8 = str_replace('k', 'к' , $y8);
	 $y8 = str_replace('l', 'l' , $y8);
  	 $y8 = str_replace('z', 'z' , $y8);
	 $y8 = str_replace('x', 'א' , $y8);
  	 $y8 = str_replace('c', 'ς' , $y8);
	 $y8 = str_replace('v', 'ⱴ' , $y8);
  	 $y8 = str_replace('b', '๒' , $y8);
  	 $y8 = str_replace('n', 'ภ' , $y8);
	 $y8 = str_replace('m', '๓' , $y8);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y8[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z9"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z9 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
	$y9 = explode("/z10", $text);
    if($y9[1]){
	 $y9 = str_replace('q', 'ҩ' , $y9);
  	 $y9 = str_replace('w', 'ω' , $y9);
	 $y9 = str_replace('e', '૯' , $y9);
  	 $y9 = str_replace('r', 'Ր' , $y9);
	 $y9 = str_replace('t', '੮' , $y9);
  	 $y9 = str_replace('y', 'ע' , $y9);
	 $y9 = str_replace('u', 'υ' , $y9);
  	 $y9 = str_replace('i', 'ɿ' , $y9);
	 $y9 = str_replace('o', '૦' , $y9);
  	 $y9 = str_replace('p', 'ƿ' , $y9);
	 $y9 = str_replace('a', 'ค' , $y9);
  	 $y9 = str_replace('s', 'ς' , $y9);
	 $y9 = str_replace('d', 'ძ' , $y9);
  	 $y9 = str_replace('f', 'Բ' , $y9);
	 $y9 = str_replace('g', '૭' , $y9);
  	 $y9 = str_replace('h', 'Һ' , $y9);
	 $y9 = str_replace('j', 'ʆ' , $y9);
  	 $y9 = str_replace('k', 'қ' , $y9);
	 $y9 = str_replace('l', 'Ն' , $y9);
  	 $y9 = str_replace('z', 'ઽ' , $y9);
	 $y9 = str_replace('x', '૪' , $y9);
  	 $y9 = str_replace('c', '८' , $y9);
	 $y9 = str_replace('v', '౮' , $y9);
  	 $y9 = str_replace('b', 'ც' , $y9);
  	 $y9 = str_replace('n', 'Ո' , $y9);
	 $y9 = str_replace('m', 'ɱ' , $y9);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y9[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z10"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z10 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
	 $y10 = explode("/z11", $text);
    if($y10[1]){
	 $y10 = str_replace('q', 'Ꝙ' ,$y10);
  	 $y10 = str_replace('w', 'Ѡ' ,$y10);
	 $y10 = str_replace('e', 'Ɛ' ,$y10);
  	 $y10 = str_replace('r', 'Ɽ' ,$y10);
	 $y10 = str_replace('t', 'Ͳ' ,$y10);
  	 $y10 = str_replace('y', 'Ỿ' ,$y10);
	 $y10 = str_replace('u', 'Ʊ' ,$y10);
  	 $y10 = str_replace('i', 'ị' ,$y10);
	 $y10 = str_replace('o', 'Ỗ' ,$y10);
  	 $y10 = str_replace('p', 'Ꝓ' ,$y10);
	 $y10 = str_replace('a', 'Λ' ,$y10);
  	 $y10 = str_replace('s', 'Ṥ' ,$y10);
	 $y10 = str_replace('d', 'δ' ,$y10);
  	 $y10 = str_replace('f', 'Բ' ,$y10);
	 $y10 = str_replace('g', '₲' ,$y10);
  	 $y10 = str_replace('h', 'Ḩ' ,$y10);
	 $y10 = str_replace('j', 'Ĵ' ,$y10);
  	 $y10 = str_replace('k', 'Ҡ' ,$y10);
	 $y10 = str_replace('l', 'Ⱡ' ,$y10);
  	 $y10 = str_replace('z', 'Ꙃ' ,$y10);
	 $y10 = str_replace('x', 'Ӿ' ,$y10);
  	 $y10 = str_replace('c', 'Ƈ' ,$y10);
	 $y10 = str_replace('v', 'Ѵ' ,$y10);
  	 $y10 = str_replace('b', 'ß' ,$y10);
  	 $y10 = str_replace('n', 'ⴂ' ,$y10);
	 $y10 = str_replace('m', 'ⴅ' ,$y10);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y10[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z11"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z11 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
	 $y11 = explode("/z12", $text);
    if($y11[1]){
	 $y11 = str_replace('q', 'ǫ' , $y11);
  	 $y11 = str_replace('w', 'ᴡ' , $y11);
	 $y11 = str_replace('e', 'ᴇ' , $y11);
  	 $y11 = str_replace('r', 'ʀ' , $y11);
	 $y11 = str_replace('t', 'ᴛ' , $y11);
  	 $y11 = str_replace('y', 'ʏ' , $y11);
	 $y11 = str_replace('u', 'ᴜ' , $y11);
  	 $y11 = str_replace('i', 'ɪ' , $y11);
	 $y11 = str_replace('o', 'ᴏ' , $y11);
  	 $y11 = str_replace('p', 'ᴘ' , $y11);
	 $y11 = str_replace('a', 'ᴀ' , $y11);
  	 $y11 = str_replace('s', 'ѕ' , $y11);
	 $y11 = str_replace('d', 'ᴅ' , $y11);
  	 $y11 = str_replace('f', 'ғ' , $y11);
	 $y11 = str_replace('g', 'ɢ' , $y11);
  	 $y11 = str_replace('h', 'ʜ' , $y11);
	 $y11 = str_replace('j', 'ᴊ' , $y11);
  	 $y11 = str_replace('k', 'ᴋ' , $y11);
	 $y11 = str_replace('l', 'ʟ' , $y11);
  	 $y11 = str_replace('z', 'ᴢ' , $y11);
	 $y11 = str_replace('x', 'х' , $y11);
  	 $y11 = str_replace('c', 'ᴄ' , $y11);
	 $y11 = str_replace('v', 'ᴠ' , $y11);
  	 $y11 = str_replace('b', 'ʙ' , $y11);
  	 $y11 = str_replace('n', 'ɴ' , $y11);
	 $y11 = str_replace('m', 'ᴍ' , $y11);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y11[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z12"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z12 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
	 $y12 = explode("/z13", $text);
    if($y12[1]){
	 $y12 = str_replace('q', 'Ｑ' , $y12);
  	 $y12 = str_replace('w', 'Ｗ' , $y12);
	 $y12 = str_replace('e', 'Ｅ' , $y12);
  	 $y12 = str_replace('r', 'Ｒ' , $y12);
	 $y12 = str_replace('t', 'Ｔ' , $y12);
  	 $y12 = str_replace('y', 'Ｙ' , $y12);
	 $y12 = str_replace('u', 'Ｕ' , $y12);
  	 $y12 = str_replace('i', 'Ｉ' , $y12);
	 $y12 = str_replace('o', 'Ｏ' , $y12);
  	 $y12 = str_replace('p', 'Ｐ' , $y12);
	 $y12 = str_replace('a', 'Ａ' , $y12);
  	 $y12 = str_replace('s', 'Ｓ' , $y12);
	 $y12 = str_replace('d', 'Ｄ' , $y12);
  	 $y12 = str_replace('f', 'Բ' , $y12);
	 $y12 = str_replace('g', 'Ｇ' , $y12);
  	 $y12 = str_replace('h', 'Ｈ' , $y12);
	 $y12 = str_replace('j', 'Ｊ' , $y12);
  	 $y12 = str_replace('k', 'Ｋ' , $y12);
	 $y12 = str_replace('l', 'Ｌ' , $y12);
  	 $y12 = str_replace('z', 'Ｚ' , $y12);
	 $y12 = str_replace('x', 'Ｘ' , $y12);
  	 $y12 = str_replace('c', 'С' , $y12);
	 $y12 = str_replace('v', 'Ｖ' , $y12);
  	 $y12 = str_replace('b', 'Ｂ' , $y12);
  	 $y12 = str_replace('n', 'Ｎ' , $y12);
	 $y12 = str_replace('m', 'Ⅿ' , $y12);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y12[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/z13"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z13 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
	 $y13 = explode("/z14", $text);
    if($y13[1]){
	 $y13 = str_replace('q', 'Ǫ' , $y13);
  	 $y13 = str_replace('w', 'Ш' , $y13);
	 $y13 = str_replace('e', 'Ξ' , $y13);
  	 $y13 = str_replace('r', 'Я' , $y13);
	 $y13 = str_replace('t', '₮' , $y13);
  	 $y13 = str_replace('y', 'Џ' , $y13);
	 $y13 = str_replace('u', 'Ǚ' , $y13);
  	 $y13 = str_replace('i', 'ł' , $y13);
	 $y13 = str_replace('o', 'Ф' , $y13);
  	 $y13 = str_replace('p', 'ק' , $y13);
	 $y13 = str_replace('a', 'Λ' , $y13);
  	 $y13 = str_replace('s', 'Ŝ' , $y13);
	 $y13 = str_replace('d', 'Ð' , $y13);
  	 $y13 = str_replace('f', 'Ŧ' , $y13);
	 $y13 = str_replace('g', '₲' , $y13);
  	 $y13 = str_replace('h', 'Ḧ' , $y13);
	 $y13 = str_replace('j', 'J' , $y13);
  	 $y13 = str_replace('k', 'К' , $y13);
	 $y13 = str_replace('l', 'Ł' , $y13);
  	 $y13 = str_replace('z', 'Ꙃ' , $y13);
	 $y13 = str_replace('x', 'Ж' , $y13);
  	 $y13 = str_replace('c', 'Ͼ' , $y13);
	 $y13 = str_replace('v', 'Ṽ' , $y13);
  	 $y13 = str_replace('b', 'Б' , $y13);
  	 $y13 = str_replace('n', 'Л' , $y13);
	 $y13 = str_replace('m', 'Ɱ' , $y13);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y13[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
	  }
    if($text == "/z14"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /z14 victor",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   $f = explode("/z15", $text);
   if($f[1]){
   $f = str_replace('q', '🇶', $f);
   $f = str_replace('w', '🇼', $f);
   $f = str_replace('e', '🇪', $f);
   $f = str_replace('r', '🇷', $f);
   $f = str_replace('t', '🇹', $f);
   $f = str_replace('y', '🇾', $f);
   $f = str_replace('u', '🇻', $f);
   $f = str_replace('i', '🇮', $f);
   $f = str_replace('o', '🇴', $f);
   $f = str_replace('p', '🇵', $f);
   $f = str_replace('a', '🇦', $f);
   $f = str_replace('s', '🇸', $f);
   $f = str_replace('d', '🇩', $f);
   $f = str_replace('f', '🇫', $f);
   $f = str_replace('g', '🇬', $f);
   $f = str_replace('h', '🇭', $f);
   $f = str_replace('j', '🇯', $f);
   $f = str_replace('k', '🇰', $f);
   $f = str_replace('l', '🇱', $f);
   $f = str_replace('z', '🇿', $f);
   $f = str_replace('x', '🇽', $f);
   $f = str_replace('c', '🇨', $f);
   $f = str_replace('v', '🇺', $f);
   $f = str_replace('b', '🇧', $f);
   $f = str_replace('n', '🇳', $f);
   $f = str_replace('m', '🇲', $f);
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>$f[1],
   'reply_markup'=>json_encode([
   'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   if($text == "/z15"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /zh1 VICTOR",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   $a = explode("/z16", $text);
   if($a[1]){
   $a = str_replace('q', '•🇶', $a);
   $a = str_replace('w', '•🇼', $a);
   $a = str_replace('e', '•🇪', $a);
   $a = str_replace('r', '•🇷', $a);
   $a = str_replace('t', '•🇹', $a);
   $a = str_replace('y', '•🇾', $a);
   $a = str_replace('u', '•🇻', $a);
   $a = str_replace('i', '•🇮', $a);
   $a = str_replace('o', '•🇴', $a);
   $a = str_replace('p', '•🇵', $a);
   $a = str_replace('a', '•🇦', $a);
   $a = str_replace('s', '•🇸', $a);
   $a = str_replace('d', '•🇩', $a);
   $a = str_replace('f', '•🇫', $a);
   $a = str_replace('g', '•🇬', $a);
   $a = str_replace('h', '•🇭', $a);
   $a = str_replace('j', '•🇯', $a);
   $a = str_replace('k', '•🇰', $a);
   $a = str_replace('l', '•🇱', $a);
   $a = str_replace('z', '•🇿', $a);
   $a = str_replace('x', '•🇽', $a);
   $a = str_replace('c', '•🇨', $a);
   $a = str_replace('v', '•🇺', $a);
   $a = str_replace('b', '•🇧', $a);
   $a = str_replace('n', '•🇳', $a);
   $a = str_replace('m', '•🇲', $a);
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>$a[1],
   'reply_markup'=>json_encode([
   'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   if($text == "/z16"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر الزغرفه + اسمك ✨“
• مثال :- 
• /zh2 VICTOR",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   if($text == "/h3"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
• قـﺳم اﻟاقـﮧﻭاس ♈️ •
ֆ • • • • • • • • • • • • • ֆ
• /a1 :- 🔥 اوامر اقواس •

• /a2 :- ☀️ اوامر قوس •

• /a3 :- 🌪  اوامر اضف •

• /a4 :- 🌤 اوامر اضافات •
ֆ • • • • • • • • • • • • • ֆ 
",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   if($text == "/a1"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
• ﭑﻭاﻣر ﭑﭰﻭاس 🔥 •
ֆ • • • • • • • • • • • • • ֆ

• 0 = •🌱💚﴿ֆ ❥
• 1 = 🍿﴿ֆ ❥ 
• 2 = • 🌸💸 ❥˓  
• 3 = 🖤🌞﴿ֆ
• 4 = • 🐼🌿﴾ֆ
• 5 = •🙊💙﴿ֆ ❥
• 6 = •⚖️💙﴿ֆ
• 7 =﴿💆🏼💗ֆ
• 8 = •💁🏼‍♂✨﴿ֆ ❥ 
• 9 = ﴿🔥🌸ֆ ❥͢ 
• @ = ♩⁽😻🌸⁞♩ 
• * = ❥ۗ🏻💙Ֆ﴾ 
• + = 😴🌸✿⇣
• ! = ❀🎼🌸℡³¹³ 
• : = 😼💛ֆ‘﴾
• ; =ᴖ̈ 💜|℡ 
• - =❥┊⁽ ℡🦁🌸
• _ = ♚😈⚡️ֆ‘
• # = ⁞“˛⁽💆🏻‍♂🌙₎⇣✿
• > = ┊⁽℡̮ 😼💛⇣
• ? = ْٰ۫₎┋⁽🦊⭐️₎ 
• / = ℡ 🌞🔥‎‏ ⁾┊❥ 
• < = ₎❉┋⁽🔥🌚₎ 
• a = ₎✿💥😈 ⁞“❥
• b = ‏‎‏ ⁾⇣✿💖┊❥
• c =  ۦٰ‏┋❥ ͢˓🦁💛ۦٰ‏
• d = ⁞✦⁽☻🔥₎“ٰۦ
• e =℡ ̇₎ ✨🐯⇣✦
• f =♛⇣🐰☄₎✦
• g =⁞♩⁽🌞🌩₎⇣✿
• h =⁞⚡️♛ֆ₎
• i =⁞❉💥┋♩
• j =⋮⁽🌔☄₎ٰۦ˛
• k =℡ᴖ̈💜✨⋮
• l =ֆ ⚡️🔱ۦٰ 
• m =ֆ 💛💭ۦٰ 
• n =  ֆ 💭💔ۦٰ 
• o =•|• ✨🌸‘
• p =┋⁽❥̚͢₎ 🐣💗
• q =⁞ 🐝🍷
• r =“̯ 🐼💗 |℡
• s =• ⁽🙆🏻🍿₎ֆ
• u =‏┆💙🙋🏼‍♂♕
• v =💜💭℡ֆ
• w =❥┇💁🏼‍♂🔥“
• x =• ⁽🙆‍♂✨₎ֆ
• y = ⚡️🌞 •|•℡
• z =•|• 〄💖‘
• ؟ =🐼⚡️ֆ‘﴾ 
ֆ • • • • • • • • • • • • • ֆ
•طﺭيقـﮫهہ ﭑﻟاﺳتـﺨﮧدام 📝 •

• ﻣثـﭑﻝ 📌:- اقواس فكتور0
• ﺟواب 🔖:- فكتور •🌱💚﴿ֆ ❥
",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "اقواس"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر اقواس + اسمك ✨“
• مثال :- 
• اقواس فكتور0",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    $a1 = explode("اقواس", $text);
    if($a1[1]){
	 $a1 = str_replace('0', '•🌱💚﴿ֆ ❥', $a1);
	 $a1 = str_replace('1', '🍿﴿ֆ ❥', $a1);
	 $a1 = str_replace('2', '• 🌸💸 ❥˓', $a1);
	 $a1 = str_replace('3', '🖤🌞﴿ֆ', $a1);
	 $a1 = str_replace('4', '🐼🌿﴾ֆ', $a1);
	 $a1 = str_replace('5', '•🙊💙﴿ֆ ❥', $a1);
	 $a1 = str_replace('6', '•⚖️💙﴿ֆ', $a1);
	 $a1 = str_replace('7', '﴿💆🏼💗ֆ', $a1);
	 $a1 = str_replace('8', '• ✨﴿ֆ ❥ ', $a1);
	 $a1 = str_replace('9', '﴿🔥🌸ֆ ❥͢ ', $a1);
	 $a1 = str_replace('@', '♩⁽😻🌸⁞♩', $a1);
	 $a1 = str_replace('*', '❥ۗ🏻💙Ֆ﴾', $a1);
	 $a1 = str_replace('+', '😴🌸✿⇣', $a1);
	 $a1 = str_replace('!', '❀🎼🌸℡³¹³ ', $a1);
	 $a1 = str_replace(':', '😼💛ֆ‘﴾', $a1);
	 $a1 = str_replace(';', 'ᴖ̈ 💜|℡', $a1);
	 $a1 = str_replace('-', '❥┊⁽ ℡🦁🌸', $a1);
	 $a1 = str_replace('_', '♚😈⚡️ֆ‘', $a1);
	 $a1 = str_replace('#', '⁞“˛⁽💆🏻‍♂🌙₎⇣✿', $a1);
	 $a1 = str_replace('>', '┊⁽℡̮ 😼💛⇣', $a1);
	 $a1 = str_replace('?', '₎┋⁽🦊⭐️₎ ', $a1);
	 $a1 = str_replace('/', '℡ 🌞🔥‎‏ ⁾┊❥ ', $a1);
	 $a1 = str_replace('<', '₎❉┋⁽🔥🌚₎ ', $a1);
	 $a1 = str_replace('a', '₎✿💥😈 ⁞“❥', $a1);
	 $a1 = str_replace('b', '⁾⇣✿💖┊❥', $a1);
	 $a1 = str_replace('c', 'ۦٰ‏┋❥ ͢˓🦁💛ۦٰ‏', $a1);
	 $a1 = str_replace('d', '⁞✦⁽☻🔥₎“ٰ', $a1);
	 $a1 = str_replace('e', '℡ ̇₎ ✨🐯⇣✦', $a1);
	 $a1 = str_replace('f', '♛⇣🐰☄₎✦', $a1);
	 $a1 = str_replace('g', '⁞♩⁽🌞🌩₎⇣✿', $a1);
	 $a1 = str_replace('h', '⁞⚡️♛ֆ₎', $a1);
	 $a1 = str_replace('i', '⁞❉💥┋♩', $a1);
	 $a1 = str_replace('j', '⋮⁽🌔☄₎ٰۦ˛', $a1);
	 $a1 = str_replace('k', '℡ᴖ̈💜✨⋮', $a1);
	 $a1 = str_replace('l', 'ֆ⚡️🔱ۦٰ ', $a1);
	 $a1 = str_replace('m', 'ֆ💛💭ۦٰ ', $a1);
	 $a1 = str_replace('n', 'ֆ💭💔ۦٰ ', $a1);
	 $a1 = str_replace('o', '•|•✨🌸‘', $a1);
	 $a1 = str_replace('p', '┊⁽❥̚͢₎ 🐣💗', $a1);
	 $a1 = str_replace('q', '⁞ 🐝🍷', $a1);
	 $a1 = str_replace('r', '“̯🐼💗 |℡', $a1);
	 $a1 = str_replace('s', '•⁽🙆🏻🍿₎ֆ', $a1);
	 $a1 = str_replace('u', '‏┆💙🙋🏼‍♂♕', $a1);
	 $a1 = str_replace('v', '💜💭℡ֆ', $a1);
	 $a1 = str_replace('w', '❥┇💁🏼‍♂🔥“', $a1);
	 $a1 = str_replace('x', '• ⁽🙆‍♂✨₎ֆ', $a1);
	 $a1 = str_replace('y', '⚡️🌞 •|•℡', $a1);
	 $a1 = str_replace('z', '•|• 〄💖‘', $a1);
	 $a1 = str_replace('؟', '🐼⚡️ֆ‘﴾ ', $a1);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$a1[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/a2"){
 	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
• ﭑﻭاﻣر ﭰﻭاس ☀️ •
ֆ • • • • • • • • • • • • • ֆ
• 0 =║👹💥ᵛ͢ᵎᵖ ⌯﴾❥
• 1 =❥┊⁽ ℡ 🌸🌞
• 2 = ⇣ ֆ ̮☻ ء
• 3 = ˛₎🐳🍥۶ֆ
• 4 = ♩┊💎🌸❥ ₎
• 5 = ₎┋💗😻
• 6 = ┇⁽💜͢）
• 7 = ⁾ ⁞♩⁽🐰💗₎✿
• 8 = 『 ֆ🍒➻┋
• 9 = ᴖ⚉✨̈ |℡
• @ = ˛⁽🐼”💗₎⇣
• * = ❥🌞🌸  ࿓‏⁾♩
• + = ₎❁😻🌸⇣
• ! = ⁽💗🌝♩❥
• : = 🍓❤️℡ֆᴖ̈
• ; = ⁾ ✿ ⁞ 💛˛
• - =┋՞❁ 🌞💥 ﴾
• _ =ֆ🙈💜❙✰ ﴾
• / =✫┋ ♛͢ ՞ ﴾
• # =¦•☬ ‘🙆‘
• < =❥•َْ ͢🤦🏻‍💔♂⁞₎
• > =┊🏻“👄🌺) ℡
• ? =┋̈⁽ ❁ 💥 ֆ
• a =❥ֆ☄⚡️ ᴗ̈
• b =┊※🏎️‘’💛
• c =﴿┊🙎🏼💛Ֆء﴾ۗ
• d =ֆ💬💖⸽
• e =₎⇣✿ ⁞😻🐼“
• f =💥۶ֆᵛ͢ᵎᵖ ⌯﴾❥
• g =❥•َ⚡️ْ🦇️͢ֆ⸽
• h =♜🌸🐝 ⁞
• i = ¦͢🙅🏻🍂₎⇣⌯﴾❥
• j =ֆ#☻⸽͢₎⇣
• k =⸽❥•َْ🌛🔥 ۶ֆ
• l = ₎⇣۶ֆ🐿✿ ⁞
• m = ❥•َْ ͢🌴🌙⸙۶ֆ
• n = ₎⇣🌚🔥 ⁞͢₎⇣
• o = ₎⇣♜⚡️͢ ⁞ֆ
• p = ⸚❥•َ🌨☃┊ٴֆ
• q =ާ҂ֆ͢🌞☄❥•َْ
• r = ₎⇣🦋🌼۶͢ֆ ⁞
• s = ║♜💛⚡️͢₎⇣✿ ⁞
• t = ⇣✿💚💥 ⁞⌯﴾
• u = ┊ާ͢💜🔥₎⇣
• v = ⌯⇣✿💙☄ ⁞﴾❥
• w = ¦⇣👽♜͢ ⁞
• x =❥•َْ👻⚡️͢⸽۶ֆ
• y = ֆ⸽♜👹🔥͢₎⇣
• z =¦🌟😺₎⇣۶ֆ
• ؟ =♛🐹🌸Ֆء﴾³¹³َ
ֆ • • • • • • • • • • • • • ֆ
•طﺭيقـﮫهہ ﭑﻟاﺳتـﺨﮧدام 📝 •

• ﻣثـﭑﻝ 📌:- قوس فكتور0
• ﺟواب 🔖:- فكتور║👹💥ᵛ͢ᵎᵖ ⌯﴾❥

",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
if($text == "قوس"){
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يمكنك زغرفه اسمك ⚡️“
• بواسطه امر قوس + اسمك ✨“
• مثال :- 
قوس فكتور0",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    $a2 = explode("قوس", $text);
    if($a2[1]){
	 $a2 = str_replace('0', '║👹💥ᵛ͢ᵎᵖ ⌯﴾❥', $a2);
	 $a2 = str_replace('1', '❥┊⁽ ℡ 🌸🌞', $a2);
	 $a2 = str_replace('2', '⇣ ֆ ̮☻ ', $a2);
	 $a2 = str_replace('3', '₎🐳🍥۶ֆ', $a2);
	 $a2 = str_replace('4', '♩┊💎🌸❥ ₎', $a2);
	 $a2 = str_replace('5', '₎┋💗😻', $a2);
	 $a2 = str_replace('6', '┇⁽💜͢）', $a2);
	 $a2 = str_replace('7', '⁾ ⁞♩⁽🐰💗₎✿', $a2);
	 $a2 = str_replace('8', '『 ֆ🍒➻┋', $a2);
	 $a2 = str_replace('9', 'ᴖ⚉✨̈ |℡', $a2);
	 $a2 = str_replace('@', '⁽🐼”💗₎⇣', $a2);
	 $a2 = str_replace('*', '❥🌞🌸  ࿓‏⁾♩', $a2);
	 $a2 = str_replace('+', '₎❁😻🌸⇣', $a2);
	 $a2 = str_replace('!', '⁽💗🌝♩❥', $a2);
	 $a2 = str_replace(':', '🍓❤️℡ֆᴖ̈', $a2);
	 $a2 = str_replace(';', '⁾ ✿ ⁞ 💛˛', $a2);
	 $a2 = str_replace('-', '┋՞❁ 🌞💥 ﴾', $a2);
	 $a2 = str_replace('_', 'ֆ🙈💜❙✰ ﴾', $a2);
	 $a2 = str_replace('#', '✫┋ ♛͢ ՞ ﴾', $a2);
	 $a2 = str_replace('>', '¦•☬ ‘🙆‘', $a2);
	 $a2 = str_replace('?', '❥•َْ ͢🤦🏻‍💔♂⁞₎', $a2);
	 $a2 = str_replace('/', '┊🏻“👄🌺) ℡', $a2);
	 $a2 = str_replace('<', '┋̈⁽ ❁ 💥 ֆ', $a2);
	 $a2 = str_replace('a', '❥ֆ☄⚡️ ᴗ̈', $a2);
	 $a2 = str_replace('b', '┊※🏎️‘’💛', $a2);
	 $a2 = str_replace('c', '﴿┊🙎🏼💛Ֆء﴾ۗ', $a2);
	 $a2 = str_replace('d', 'ֆ💬💖⸽', $a2);
	 $a2 = str_replace('e', '₎⇣✿ ⁞😻🐼“', $a2);
	 $a2 = str_replace('f', '💥۶ֆᵛ͢ᵎᵖ ⌯﴾❥', $a2);
	 $a2 = str_replace('g', '❥•َ⚡️ْ🦇️͢ֆ⸽', $a2);
	 $a2 = str_replace('h', '♜🌸🐝 ⁞', $a2);
	 $a2 = str_replace('i', '¦͢🙅🏻🍂₎⇣⌯﴾❥', $a2);
	 $a2 = str_replace('j', '⋮⁽🌔☄₎ٰۦ˛', $a2);
	 $a2 = str_replace('k', 'ֆ#☻⸽͢₎⇣', $a2);
	 $a2 = str_replace('l', '⸽❥•َْ🌛🔥 ۶ֆ', $a2);
	 $a2 = str_replace('m', '₎⇣۶ֆ🐿✿ ⁞', $a2);
	 $a2 = str_replace('n', '❥•َْ ͢🌴🌙⸙۶ֆ', $a2);
	 $a2 = str_replace('o', '₎⇣🌚🔥 ⁞͢₎⇣‘', $a2);
	 $a2 = str_replace('p', '₎⇣♜⚡️͢ ⁞ֆ', $a2);
	 $a2 = str_replace('q', '⸚❥•َ🌨☃┊ٴֆ', $a2);
	 $a2 = str_replace('r', '҂ֆ͢🌞☄❥•َْ', $a);
	 $a2 = str_replace('s', '₎⇣🦋🌼۶͢ֆ ⁞', $a2);
	 $a2 = str_replace('u', ' ⇣✿💚💥 ⁞⌯﴾', $a2);
	 $a2 = str_replace('v', '┊ާ͢💜🔥₎⇣', $a2);
	 $a2 = str_replace('w', ' ⌯⇣✿💙☄ ⁞﴾❥', $a2);
	 $a2 = str_replace('x', ' ¦⇣👽♜͢ ⁞', $a2);
	 $a2 = str_replace('y', '❥•َْ👻⚡️͢⸽۶ֆ', $a2);
	 $a2 = str_replace('z', 'ֆ⸽♜👹🔥͢₎⇣', $a2);
	 $a2 = str_replace('؟', '¦🌟😺₎⇣۶ֆ', $a2);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$a2[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/a3"){
 	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• ﭑﻭاﻣر ﭑﺿف 🌪 •
ֆ • • • • • • • • • • • • • ֆ

• 0 = ♛#ֆ‘﴾ۗ
• 1 = ⌯⌯﴾ 🐰#❁ֆ  
• 2 = ⌯ ֆ ̯͡“🍕🐹“⁾
• 3 =  • ᵛ͢ᵎᵖ ⌯﴾🙊💙❁
• 4 = “✾♛ 🐹💗‘﴾❥
• 5 = “❉♛ 🐿“⌯﴾❥
• 6 = ⁽ ֆ ̯͡“🌿🍟“
• 7 =  ⌯﴾ 🍥ᵛ͢ᵎᵖ🏮❁
• 8 =  ⌯❖”ֆ🌧🐥“
• 9 =卍⁽ ֆ🌞⚡️ ̯͡“ 
• @ = ⁽ ֆ ̯͡“🚜🌿‘
• * = ✾😻🌸‘⌯﴾❥
• + = ✾♛💛¡⌯﴾❥
• ! = ⇣❥ֆ♔┇
• ; = 卍♛⁽ ֆ ̯͡“
• : = 卍🔰⁽ 🌝☄
• - = ❥┊⁽ ♔ ♬
• _ =  ͜❁̚͢❀🌛🌟‘
• / =  卍♚⁽ ֆ ̯͡“🌞🔥“
• ؟ = ┊⁞🐞🔐♩
• < = 💛🍃͜❁̚͢❀┇
• > =║☻ ₍♚⁾🔥 
• ? = 💅🏻🌸⇣℡
• a = ۧֆ⸽🖤✨͢₎⇣
• b = ┊💸♥️ֆ
• c = 🔐💛)“
• d = ًٰ 🍎🐼‏ ﴾ ֆ
• e = ℡̮⇣┆👑😻⇣ۦ
• f =℡̮⇣┆🌻⇣℡ 
• g = ℡ 🙈💚‏‎‏ ⁾┊❥
• h = ۦ˛⁽😻💗₎⇣
• i = ℡̮⁽😸💙₎⇣ٖ
• j = ☻‏ֆ💗۽“
• k = ∬💗🌚﴾
• l = ✿ ₎⇣🐼🦋“
• m = ֆ ﴿🙂🔥) ♚̈̈
• n = ً┇😁❤℡⇣“
• o = ↲💜💬(⠀❥
• p =ًّ•|•🌝🌸✨:)
• q =ّ ﴿☻🖤) ♕↝
• r =卍🙃♛⁽ ֆ ̯͡“
• s = ┋🎼🕊 ͢ۦٰ‏❥
• u = ┊♚⁞🌕♩

ֆ • • • • • • • • • • • • • ֆ
•طﺭيقـﮫهہ ﭑﻟاﺳتـﺨﮧدام 📝 •

• ﻣثـﭑﻝ 📌:- اضف فكتور0
• ﺟواب 🔖:- فكتور♛#ֆ‘﴾ۗ
",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    $a3 = explode("اضف", $text);
    if($a3[1]){
	 $a3 = str_replace('0', '♛#ֆ‘﴾ۗ', $a3);
	 $a3 = str_replace('1', '⌯﴾ 🐰#❁ֆ  ', $a3);
	 $a3 = str_replace('2', '⌯ ֆ ̯͡“🍕🐹“⁾', $a3);
	 $a3 = str_replace('3', '• ᵛ͢ᵎᵖ ⌯﴾🙊💙❁', $a3);
	 $a3 = str_replace('4', '“✾♛ 🐹💗‘﴾❥', $a3);
	 $a3 = str_replace('5', '“❉♛ 🐿“⌯﴾❥', $a3);
	 $a3 = str_replace('6', '⁽ ֆ ̯͡“🌿🍟“', $a3);
	 $a3 = str_replace('7', '⌯﴾ 🍥ᵛ͢ᵎᵖ🏮❁', $a3);
	 $a3 = str_replace('8', '⌯❖”ֆ🌧🐥“', $a3);
	 $a3 = str_replace('9', '卍⁽ ֆ🌞⚡️ ̯͡“ ', $a3);
	 $a3 = str_replace('@', '⁽ ֆ ̯͡“🚜🌿‘', $a3);
	 $a3 = str_replace('*', '✾😻🌸‘⌯﴾❥', $a3);
	 $a3 = str_replace('+', '✾♛💛¡⌯﴾❥', $a3);
	 $a3 = str_replace('!', '⇣❥ֆ♔┇', $a3);
	 $a3 = str_replace(':', '卍♛⁽ ֆ ̯͡“', $a3);
	 $a3 = str_replace(';', '卍🔰⁽ 🌝☄', $a3);
	 $a3 = str_replace('-', '❥┊⁽ ♔ ♬', $a3);
	 $a3 = str_replace('_', '❁̚͢❀🌛🌟‘', $a3);
	 $a3 = str_replace('/', '卍♚⁽ ֆ ̯͡“🌞🔥“', $a3);
	 $a3 = str_replace('؟', '┊⁞🐞🔐♩', $a3);
	 $a3 = str_replace('<', '💛🍃͜❁̚͢❀┇', $a3);
	 $a3 = str_replace('>', '║☻ ₍♚⁾🔥 ', $a3);
	 $a3 = str_replace('?', '💅🏻🌸⇣℡', $a3);
	 $a3 = str_replace('a', ' ۧֆ⸽🖤✨͢₎⇣', $a3);
	 $a3 = str_replace('b', '┊💸♥️ֆ', $a3);
	 $a3 = str_replace('c', '🔐💛)“', $a3);
	 $a3 = str_replace('d', ' 🍎🐼‏ ﴾ ֆ', $a3);
	 $a3 = str_replace('e', '℡̮⇣┆👑😻⇣', $a3);
	 $a3 = str_replace('f', '℡̮⇣┆🌻⇣℡ ', $a3);
	 $a3 = str_replace('g', '℡ 🙈💚‏‎‏ ⁾┊❥', $a3);
	 $a3 = str_replace('h', ' ۦ˛⁽😻💗₎⇣', $a3);
	 $a3 = str_replace('i', '℡̮⁽😸💙₎⇣ٖ', $a3);
	 $a3 = str_replace('j', ' ☻‏ֆ💗۽“', $a3);
	 $a3 = str_replace('k', '∬💗🌚﴾', $a3);
	 $a3 = str_replace('l', '✿ ₎⇣🐼🦋“', $a3);
	 $a3 = str_replace('m', ' ﴿🙂🔥) ♚̈̈', $a3);
	 $a3 = str_replace('n', '┇😁❤℡⇣“', $a3);
	 $a3 = str_replace('o', '↲💜💬(⠀❥', $a3);
	 $a3 = str_replace('p', '•|•🌝🌸✨:)', $a3);
	 $a3 = str_replace('q', ' ﴿☻🖤) ♕↝', $a3);
	 $a3 = str_replace('r', '卍🙃♛⁽ ֆ ̯͡“', $a3);
	 $a3 = str_replace('s', ' ┋🎼🕊 ͢ۦٰ‏❥', $a3);
	 $a3 = str_replace('u', '┊♚⁞🌕♩', $a3);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$a3[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/a4"){
 	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
• ﭑﻭاﻣر ﭑﺿﭑفات 🌤 •
ֆ • • • • • • • • • • • • • ֆ

• 0 = ⁽ֆᵛ͢ᵎᵖ✨🔖⁾
• 1 = ☫ۦٰ️💛#ֆ’ٰ
• 2 = ” ᵛ͢ᵎᵖ📯💛﴾
• 3 = ’ֆ💧💆
• 4 = ”✤🙇🏻‍♀️🌿℡
• 5 = ℠⁽“ֆ🍃🌙ᴖ̈
• 6 = ﴾↝∬💛💸𖤍⁾
• 7 = ⁽“͢ 🥁🙍🏻‍♂️✦₎
• 8 = ⁽♜🎸🤕﴾⁶⁹
• 9 = ↡✼✨💎ᵛ͢ᵎᵖ﴾
• @ = ↡➰💛⋮™
• * = ↺⚖️💙≬℠
• + = 〞❊🎶🏮“﴾
• ! = ٰٰ☫ٰ⇣🐼💙ֆ℠
• ; = ٰ☬✨🛡⇝﴾”
• : = ⁵⁶🗺🦅“♖#
• - = ⇣❊🎏🏰“ֆ﴾℡
• _ = ♛⌗👽ᵛ͢🚀﴾⌯
• / = ✧⌟☻✨✱⌜℡
• ؟ = ⁽🕸🦊↡₎℠
• < = ➤|💨ֆ🌪
• > = ╬ֆ☻
• ? = ❊😼🎶ֆ
• a =║✠🐰☄ֆ 
• b = ⋮❖🐹🍑ֆ
• c = ∬💛✨ֆ
• d = ║♚💨🌛⋮ֆ
• e =⋮❊ֆ🦊🥇 
• f = ♯⋮ֆ🗡🦁
• g = ∬❖🌞🎶﴾
• h = ║♚✨🐝﴾
• i =  ⋮❊🐨🌈﴾
• j = ∬🐛🍎ֆ
• k = ║🐌🕸✤ֆ 
• l = |🐙🐚ֆ
• m = ♚⋮ֆ🛡🦅 
• n = ֆ 💸😾⋮
• o = ✠😼🖤⋮
• p =➤ ♛🌝₎Ֆ
• q = ⋮卍🌛🍁ֆ

ֆ • • • • • • • • • • • • • ֆ
•طﺭيقـﮫهہ ﭑﻟاﺳتـﺨﮧدام 📝 •

• ﻣثـﭑﻝ 📌:- اضافات ليـَہﯛ8୭
• ﺟواب 🔖:- ليـَہﯛ⁽♜🎸🤕﴾⁶⁹୭
",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   $a4 = explode("اضافات",$text);
    if($a4[1]){
	 $a4 = str_replace('0', '☫ۦٰ️💛#ֆ’ٰ', $a4);
	 $a4 = str_replace('1', '⁽ֆᵛ͢ᵎᵖ✨🔖⁾', $a4);
	 $a4 = str_replace('2', '” ᵛ͢ᵎᵖ📯💛﴾', $a4);
	 $a4 = str_replace('3', '’ֆ💧💆', $a4);
	 $a4 = str_replace('4', '”✤🙇🏻‍♀️🌿℡', $a4);
	 $a4 = str_replace('5', '℠⁽“ֆ🍃🌙ᴖ̈', $a4);
	 $a4 = str_replace('6', '﴾↝∬💛💸𖤍⁾', $a4);
	 $a4 = str_replace('7', '⁽“͢ 🥁🙍🏻‍♂️✦₎', $a4);
	 $a4 = str_replace('8', '⁽♜🎸🤕﴾⁶⁹', $a4);
	 $a4 = str_replace('9', '↡✼✨💎ᵛ͢ᵎᵖ﴾', $a4);
	 $a4 = str_replace('@', '↡➰💛⋮™', $a4);
	 $a4 = str_replace('*', '↺⚖️💙≬℠', $a4);
	 $a4 = str_replace('+', '〞❊🎶🏮“﴾', $a4);
	 $a4 = str_replace('!', '☫ٰ⇣🐼💙ֆ℠', $a4);
	 $a4 = str_replace(':', '✨🛡⇝﴾”', $a4);
	 $a4 = str_replace(';', '⁵⁶🗺🦅“♖#', $a4);
	 $a4 = str_replace('-', '⇣❊🎏🏰“ֆ﴾℡', $a4);
	 $a4 = str_replace('_', '♛⌗👽ᵛ͢🚀﴾⌯', $a4);
	 $a4 = str_replace('/', '✧⌟☻✨✱⌜℡', $a4);
	 $a4 = str_replace('؟', '⁽🕸🦊↡₎℠', $a4);
	 $a4 = str_replace('<', '➤|💨ֆ🌪', $a4);
	 $a4 = str_replace('>', '╬ֆ☻', $a4);
	 $a4 = str_replace('?', '❊😼🎶ֆ', $a4);
	 $a4 = str_replace('a', '║✠🐰☄ֆ ', $a4);
	 $a4 = str_replace('b', ' ⋮❖🐹🍑ֆ', $a4);
	 $a4 = str_replace('c', '∬💛✨ֆ', $a4);
	 $a4 = str_replace('d', '║♚💨🌛⋮ֆ', $a4);
	 $a4 = str_replace('e', '⋮❊ֆ🦊🥇 ', $a4);
	 $a4 = str_replace('f', '♯⋮ֆ🗡🦁', $a4);
	 $a4 = str_replace('g', '∬❖🌞🎶﴾', $a4);
	 $a4 = str_replace('h', '║♚✨🐝﴾', $a4);
	 $a4 = str_replace('i', '⋮❊🐨🌈﴾', $a4);
	 $a4 = str_replace('j', '∬🐛🍎ֆ', $a4);
	 $a4 = str_replace('k', '║🐌🕸✤ֆ ', $a4);
	 $a4 = str_replace('l', '|🐙🐚ֆ', $a4);
	 $a4 = str_replace('m', '♚⋮ֆ🛡🦅 ', $a4);
	 $a4 = str_replace('n', 'ֆ 💸😾⋮', $a4);
	 $a4 = str_replace('o', '✠😼🖤⋮', $a4);
	 $a4 = str_replace('p', '➤ ♛🌝₎Ֆ', $a4);
	 $a4 = str_replace('q', '⋮卍🌛🍁ֆ', $a4);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$a4[1],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
if($text == "/h4"){
 	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• قـﺳم ﭑﻟﺯﻏرﭬﮫهہ ﭑﻟاخرئ ❇️ •
ֆ • • • • • • • • • • • • • ֆ
• /hb :- 🌛 اوامر زغرفه البايو •

• /hj :- 🌿 اوامر الاسماء و الاختصارات •
ֆ • • • • • • • • • • • • • ֆ",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
   $bio = explode("بايو",$text);
    if($bio[1]){
    $array = array(
"⠀ 
 
⠀ ⠀⠀⠀ ⠀ ⠀ ⠀﴾ BASRA‛❥ ﴿ 
 ㅤㅤㅤ
    ﴿ $bio[1] ☻ 
          «  ᗯEᒪᑕOᗰ ,TO ᗰY, ᑭᖇᖴᒪ 💗»
⠀⠀
⠀",
"⠀
⠀
⠀
                ♪ ＳＮᗩᎮ ↬ ❥ 
                 
  $bio[1] .!💬  

         ٴDirєct ➺ Bℓσcҝ ☻⠀♕

⠀
⠀",
"⠀⠀⠀⠀
⠀⠀⠀⠀
⠀⠀⠀⠀
⠀⠀⠀⠀
⠀⠀⠀⠀
⠀⠀ ❥  ﴾ $bio[1] ﴿
⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀
⠀⠀⠀",
"⠀⠀⠀
⠀
⠀
⠀⠀
⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀ 
 •$bio[1]🚶🏿
⠀⠀«welcome to my profile» ⠀⠀⠀⠀⠀⠀⠀◂◂⠀ 
⠀
⠀
⠀",
"‏⠀
‏⠀
‏⠀
‏⠀
‏⠀
‏⠀
⠀
⠀⠀ ⠀⠀ ⠀ • 19 - Y.O 𖤍
« ‏$bio[1] ، 🖤 ‏ֆ‛
‏⠀⠀⠀
‏⠀
‏⠀
‏⠀
‏⠀",
"⠀
‏⠀


⠀
⠀ 
⠀⠀⠀⠀⠀- ⁽ M E S A N₎ ‏‏ ᏰᎯᎶᏂᎴᎯᎴ ♛⇣
 ً • $bio[1] ؛🥀💤'️؛☻
⠀⠀

⠀",
"‎‏⠀
‎‏⠀
⠀⠀

⠀
⠀⠀⠀⠀⠀⠀      ✗ IR‏ΔQ ˛⁽💛₎⇣    




﴿ • $bio[1] ”ء
⠀
⠀


⠀‎
‏⠀⠀🌝❤️",
"⠀
⠀
⠀
⠀
⠀⠀⠀⠀⠀ ➝ IR‏ΔQ ˛⁽💗₎⇣
⠀
‏‹• $bio[1] ء ﴾‏ '‏⠀

‏⠀",
"⠀
⠀
⠀



⠀⠀⠀⠀⠀⠀IRΔQ┆19 Y.O ↴    
⠀
   ﴿ $bio[1].
⠀
⠀
⠀
⠀",
"‎‏⠀
‎‏⠀
‏
⠀⠀

⠀
⠀⠀⠀⠀⠀⠀✗ IR‏ΔQ ˛⁽💛₎⇣    
﴿ ‏‏‏$bio[1]
⠀
⠀
⠀‎
‏⠀⠀",
"⠀
⠀
⠀
⠀                  
⠀            ⠀IQ |✿ BASRA ♩❥🇮🇶✨ 

   $bio[1]
⠀⠀⠀⠀⠀⠀  
                    ⠀┋⇝15: Ꭹ.Ꭷ⇜┋
⠀
⠀
⠀",
"↓˓♯⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀



                            ㅤ
 $bio[1]﴾❥ ⠀⠀⠀⠀⠀⠀
‏   
⠀⠀ ⠀ ⠀ㅤiＱ » #αℓ-иαjαf  »
⠀⠀⠀⠀⠀⠀⠀
⠀",
"⠀
⠀
⠀
⠀‏
‎‏⠀⠀⠀⠀⠀⠀⠀⠀➝ ᗩᘐᕮ:18 🌸ֆ'
⠀
 ⠀  ِ
$bio[1]❥₎⇣🍥' 💕⠀⠀
⠀⠀⠀⠀╰┄┄┄┄┄﴿💗﴾ ┄┄┄┄┄╯
⠀
⠀
⠀",
"⠀
⠀
⠀
⠀
⠀⠀⠀     ⠀  ⠀➝ IR‏ΔQ ˛⁽💗 ₎⇣  
⠀⠀⠀⠀
   ‏$bio[1]'₎
‏                
                    ⠀⠀┄༻💗༺┄       ⠀
⠀⠀⠀⠀
⠀
⠀",
"‏⠀⠀
‏⠀⠀⠀
‏⠀
‏⠀
               ‏⠀⠀⠀⠀ ⠀❋ 18 ᗩGE
﴿• $bio[1]ֆ ' 
‏⠀⠀⠀     ‹#LIKE | COMMENT⠀⠀

⠀
‏⠀
‏⠀",
"⠀

⠀
⠀
⠀⠀ ⠀⠀⠀⠀⠀⠀⠀| ؁   ⠀
⠀⠀ ⠀⠀⠀ ⠀⠀⠀ᴾᴴᴼᵀᴼᴳᴿᴬᴾᴴᴱ⠀⠀
   ⠀⠀
‏$bio[1]
⠀⠀↬  ❈⁽ шεʟcσмε тσ мч Profile ❁
⠀
⠀",
"⠀⠀ ⠀
⠀
⠀
⠀
⠀⠀ ⠀
⠀
⠀⠀⠀

 ♯$bio[1]
⠀⠀⠀⠀⠀﴾ IQ ﴿ 🇮🇶 ↭ ❥ᗷᗩᔕᖇᗩ❊
⠀⠀⠀⠀⠀⠀⠀⠀◂◂⠀⠀⠀▮▮⠀⠀⠀▸▸ 
⠀
⠀
⠀",
"⠀

⠀⠀⠀⠀⠀⠀↬ ❥ ᎥᎤ || ᗷᗩGᕼᗪᗩᗪ  



 ﴿ '‏$bio[1] ! 💙 ֆ 

⠀⠀         ⠀   ♪ ⠀◄◂⠀▮▮⠀▸►   ♫
⠀
⠀",
"⠀
⠀
⠀⠀⠀⠀
⇣⁽ ☻ ₎˛‏‏⠀ ‏⠀‏⠀‏⠀‏⠀ ‏⠀‏⠀‏⠀‏‏⠀ ‏⠀‏⠀‏⠀
﴿ $bio[1]|✿⸀ֆء ‏‏⠀‏‏⠀
⠀ ‏
⠀‏⠀⠀⠀⠀⠀⠀ ⠀⠀ ⠀✿ ⁞ ؁ 8⠀
‏⠀
⠀⠀
⠀",
"⠀⠀⠀⠀⠀⠀⠀⠀  ❥{❊↡16
⠀‏⠀
⠀⠀⠀⠀⠀⠀⠀  
$bio[1]
 ⠀
⠀⠀⠀⠀⠀⠀'💗ֆ ‏ↄȊↄċɹ̣┊ᘓᓆі͛ȷɕᒧȋ
⠀
⠀",
"‏⠀
‏⠀
‏⠀
‏⠀
⠀⠀⠀⠀⠀ ❈ ⁽  ✿ ₎❈↴

  

‎‏⠀       
   ﴿ $bio[1]
⠀⠀⠀ ⠀⠀
‏⠀
‏⠀
‏⠀"
);
    $rand = array_rand($array, 1);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$array[$rand],
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/hb"){
 	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• ﭑﻭاﻣر ﺯﻏرﭬﮫهہ اﻟﺑايو 🌛️ •
ֆ • • • • • • • • • • • • • ֆ
•طﺭيقـﮫهہ ﭑﻟاﺳتـﺨﮧدام 📝 •

• ﻣثـﭑﻝ 📌:- بايو • حتى الن̲ـﮧو૭م متغي̲ـﮧر علي̲ـهہ

• ﺟواب 🔖:- 
🚶🏻₎ֆ





〞‏ ‏• حتى الن̲ـﮧو૭م متغي̲ـﮧر علي̲ـهہ
⠀⠀〝 υηғσℓℓσω ➝ вℓσcк ✿ 〞

• وكل مدز الامر و الجمله
• ينطيك بايو شكل ♻️ •

ֆ • • • • • • • • • • • • • ֆ
",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    if($text == "/hj"){
 	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• ﭑﻭاﻣر اﻟاسماء و اﻟاخـتصارات اﻟﺟاﮪهزهہ 🌿 •
ֆ • • • • • • • • • • • • • ֆ

•  يمكنك الان ارسال اسمك او الاختصار ✳️ •

• اذ لمن يكن اسمك مدروج تحت 
• الاسماء الجاهزه يمكنك زخرفته 
• يدويا بارسال الاوامر ✅ •

ֆ • • • • • • • • • • • • • ֆ",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
$names = array(
"جود"=>"• ﭴو൭د ⋮🌛✨ֆ➤",
"علوش"=>"• ؏̲ـلو૭ش ║☻♚ֆ",
"ظاهر"=>"• ظﭑ̲ﮪﮧر⋮🤷🏻‍♂ֆ➤",
"حموده"=>"• ﺣمو൭دﮪﮧة ֆ🐼♚﴾",
"خلودي"=>"• ̲خلو૭دي ⋮ֆ🐰💛﴾",
"رشا"=>"• رشٱ ֆ💁🏻💙⋮➤",
"نارو"=>"• ﻧﻧﭑرو૭ ➤🔥⋮﴾",
"اوم شامه"=>"• ﭑو൭م شا̲ﻣﻣهہ ֆ🙆🏼💚➤⋮",
"طيف"=>"• طي̲ـﮧف ♚👻﴾➤",
"ريكو"=>"• رٍيڪۛڪۛوֆ̲⁽͢⚡️🌝૭َ",
"منار"=>"• ﻣ̲ﻣﻧﮧﭑر⁽“͢🐰✨✦₎",
"زوزايه"=>"• زو൭زاي̲ـههہ 🐰🌙ֆ",
"اوم لسان"=>"• ﭑ̲وِ൭ﻣﮧ ﻟ̲ﺳﮧﭑטּ ⁽͢😼👅ֆ",
"محمد"=>"• ﻣ̲ﻣﺣﻣد ⋮🌝💥➤ֆ",
"فهد"=>"• ﭬهـﮧد ║🌛♚﴾",
"عبدالله"=>"• ؏ـبداﻟﻟهہֆ☻♚﴾",
"برائه"=>"• ﺑﺑرا̲ئـهہ💁🏻✨ֆ➤",
"وجدان"=>"• و૭ﭴداטּ ║🙆🏼‍♂♚﴾",
"ابو كيان"=>"• اب̲ـﮧو૭ كـي̲ــاטּ ♛⌗🌛✨͢﴾⌯",
"مصطفى"=>"•  ﻣﻣﺻطفى ⁽“͢🏹ֆ₎",
"ذبانه"=>"• ذﺑﺑﭑﻧﻧهہ ⁽“͢🐜ֆ₎",
"بنوشه"=>"• ﺑﺑـنو૭شهہ⁽“͢💆🏼💛ֆ₎",
"نضوري"=>"• ﻧﻧﺿﺿو૭ري⁽“͢🎧✨ֆ₎",
"رغد"=>"• رﻏ̲ﻏد⁽“͢🌛🌟ֆ₎",
"فاطمه"=>"• ﭬﭑطﻣﻣهہ⁽“͢🐰💛ֆ₎",
"زهراء"=>"• ز̲ﮪﺭاء⁽“͢🐹💚ֆ₎",
"مومل"=>"• ﻣو୭ﻣل⁽“🛡͢🦅ֆ₎",
"دكتوره"=>"•  دِْٰڪتِْٰ̲ـﮧوِْٰ૭رِْٰهِْٰهِْٰہ 👩🏼‍⚕💛ֆ",
"مادلين"=>"مـ๋͜͡‏ـٰٰٰٰٰٰٰٰٖٖ̲ـٱډلـ๋͜͡‏ــيـ̲ـٰٰٰٖٖ͜ــٰٰٰٰٰٖטּ˛⁽🐰🍷₎⇣",
"عسوله"=>"﴿ ﻋﻋٰسـﯛلـﮫـِﮧَ ،💜 ❁♩ءُ",
"زينب"=>"- زَيِٰـــنَِٰـٰبّ ﴿💗👅ֆ ❥͢",
"مارلين"=>"• مٰ̲ـآرليِــنَِٰ ┊💙🍟※",
"مرتضى"=>"•مٰ̲ـرتَـضٰٰۜى✫┋🖤💸 ﴾",
"نبا"=>"• نَِٰــﺑبّـآﭑ ،ֆ💛🗞﴾",
"حسين"=>"• حَسۂٰ۫ﹻۧـيڼ ┇⁽͢͢☻💛）",
"ثكيلهم"=>"ثہۧگـڪۧـيلۧهمـــمۦ ۛᵛ͢ᵎᵖ﴾❥┇🔞ۨ",
"كمر حنطاوي"=>"ڪـمُـر حٍنطُـــــــاويہہ﴾🌸ُ◌┇✾",
"دلوعه"=>"ڊلـــﯠٌۄعــٌـههُہ 🍯🌸 ֆء",
"ابن الحشد"=>"﴿˿◝ੋإـبـنے ﭑﭐلـۣٛـحٓشـٚدۦ˿✌️",
"بنت الحشد"=>"﴿˿◝ੋبـنـتے ﭑﭐلـۣٛـحٓشـٚدۦ˿✌️",
"صكارهم"=>"﴿˿◝ੋصـۣـگـﭑﭐرـهمہۦ˿😾",
"صكارتهم"=>"﴿˿◝ੋصـۣـگـﭑﭐرـتهمہۦ˿😾",
"عاشكها"=>"﴿˿◝ੋ ؏َـﭑﭐشـۣـگهـﭑﭑ˿❉❥",
"عاشكته"=>"﴿˿◝ੋ ؏َـﭑﭐشـۣـگتههہ˿❉❥",
"مخبله وبكيفي"=>"« مِـﮩـڂـبَلْـہهًهہ ء وِبُـﮩـﮕـيُـفُيُ ⇣✿ 🐝🌿",
"ارنوبه"=>"أرنہٰٰـ﴿🐰﴾ـٰ୭بـۿﮧۧ❥۪",
"ام ريتاج"=>"⠀❥┊⁽ ℡ 💛🐰 امہ ڔيـۧہـِۧتـہِﹷـٰاﺝ ⁾♩",
"نرجوسه"=>"• ﻧرﭼِـِﯠڛـﮪَۨهَۨہ ⇣ֆ💗۽",
"ديبيكا"=>"ډيـہٰ۪۫ﹷـبــيـﹷگَۨـہٰٰ۪۫ٱٱ┊🐹💗",
"ابو ميار"=>"أبـ૭ مْــﮩ๋͜͡‏ـيَــ✮๋͜͡‏ـاړ⇣║💜🍺",
"عاشكة"=>"عاشہٰٰ۫ےﹻٰٰۖكهہٰٰ۫ےﹻٰٰۖة 🌸┇♪̠☻  ۦﮧ",
"خالتكم الصاكه"=>"خـاالـتـڪـ۾ الـصـااڪـههۂ㋡💜",
"شقاوجية"=>"شہہقہہہأإؤوچہيہہةة  ۦ،‏👅",
"بنوته كيوت"=>"بـٰـٰنـوٖ୭ٰتــٰۿٰﮧٰ ڪۗـيۧـﯠﯠت ⇣💚😻",
"بسكوته"=>"”بٰٰ̯سْسـْٰڪﯙ୭تۿْٰۿـہٰۛ • ٰٰٰٰٓٓٓ🖤✨₎”",
"حموري"=>"ﺣـٰٰٰ͟ــــٰٰٰ͟ـوפري┊ℋＯℜℜＹ🛴🦋",
"شيخهم"=>"♔ڜـيـڅــﮪـ̲̌ﮧم♔┊☬🚶",
"كصيرونه"=>"ڪٰـٰٰٖصۛـيِٰـروِ୭نَِٰـﮪهۃ ،🍿ツ",
"مزاجية"=>"• مــٰٰ۪۪۫ـٰٰٰٰٰ۪۪۪۪۫۫ۧ۫۫ـٰٰٰ۪۪۫۫ۧـٰٰ۪۫ـزاجྀـٓـيـٰهـﮧةّ ٰٰۦ💚|℡",
"حشداوي"=>"• ححَشـداۅي،🇮🇶✊🏼 ҉ ֆ",
"كوتينهو"=>"َ• گوتينۿﮧـﯡَ ،🏹♥️ ҉ ֆ'",
"كوكه"=>"ڪــٰٰٰ͟ــوڪـهـۂ ┋ ＫＯⱩᎯp💕👅",
"حيدوري"=>"¦ حـﹻٰ۫ﹻۧﹻـيــُ̲ـدوريـہۦ ᴖ💙̈ |℡",
"مجهول"=>"مـۤﹻٰ۫ﹻجۧـه‍ٰ̲ـٰཻ̲ـــ̲و໑ل✫┋💧 ♛͢ ՞ ﴾",
"رسامه"=>"رســ͡ـ̡ہٰٰامــۢ͜ہٰههہ ♪♚┇🐼🦋𖤍 ₎",
"تاجهم"=>"🎈😻🌸┇℡❥ ρ᎗බ᎗ִִִִִִב I᎗̈ɹ",
"نوسه"=>"💜┋✿ તɹɹɹg᎗ɹ̇ ͎‏❥‎♩‏‎₎",
"لوتيه"=>"💧🌸🐰┊ ɑ᎗ɹ̤᎗̈ɹ g᎗ɺ",
"هدوشه"=>"🐝(💜  ❥αɹɹ̈̇ɹgנ᎗බ↝♔",
"اوم غمازه"=>"⁽💛 ₎ ⁞♩⁽ ℡ ɷjlᓄċ ρgІ͛",
"مريومه"=>"🚶‍♀┋🎧🌸┋،Ꭷᓄgɹ̤ȷᓄ",
"توتاية"=>"🚶‍♀🦋┋🎧💗┋،ɑ̈ɹ̤ᒪɹ̈gɹ̈",
"بزونة"=>"‏   ɑ̈‿ɹ̇gjɹ̣ ┋💜🎧┋",
"غفران"=>"• غـٰٰٰٰٰٰٰ̲ـــفـہٰﹻٰ۪۫ﹻٰٰﹻٰٰـراטּ  ¦•  ٰٰۦ☬ ‘🙆‘ء",
"ضلعة ابليس"=>"• ضـٰ̲ــلعـًـًه̲̐ـۂ ﺄبـٰཻل̲ـــيـسً 💦👿ֆ' ٰ",
"لقاء"=>"ᒪIᑫᗩᗩ ┋͎ لقــٰ۫ﹻۧﹻٰﹻٰ۫ـٍٰٖہٰٰٖاء ⁽♔₎ 💙",
"فاروق"=>"• ‏# فـٰཻــ̲ارو‏୭ق‏ ،☻🍺)ֆ",
"كمرهن"=>"ڪٰــٰٰٖمٰــرٰۿۿۢہٰۛــنَِ 💗🐰﴾ٰ",
"كيبوبيه"=>"ڪـيِٰـبّـوِ୭بّـِٰيـﮪھہ 💜🐰﴾",
"علويه"=>"؏ـٰـلــِٰويــﮪـٰهۃ ة َ  ؛ء (💗🤞🏻)ֆ",
"عبودي"=>"؏ـٰبٰوٓديٰـہۛ ↜ ᗩᗹᗢᗪᗴ 💛🌸’ ﴾",
"كوردستانيه"=>"• ڪٖـﯟפردسٰـتۛآنيٓۿہ ،♥️ֆ",
"سنفوره"=>"سٖـ̲ـٰٛﮩ͡ـﻨﻔٖـٰؤ୭رﻫٰﮧ ة  •|•💙🌿‘ء",
"ملكه"=>"• # م̲لـٰٰཻ̯ڪ̲ـۿۿۃ ،♥️🍿┊ֆ℡",
"مصممه"=>"• # مـصٰٰ̲ـممـۧـهۃٓه ؛💗💭)̯ֆء",
"دلو"=>"• دلـٓو୭و ، dαισ !🍿🍥)",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
""=>"",
);
foreach($names as $txt => $res){ 
if($text == $txt ){ 
bot("sendChatAction",[ 
    "chat_id"=>$chat_id, 
    "action"=>"typing",]); 
    sleep(2); 
    bot('sendMessage',[ 
    'chat_id'=>$chat_id, 
    "text"=>"$res",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• CH •",'url'=>"https://t.me/$userch"],['text'=>"• Dev •",'url'=>"https://t.me/$userdev"]],
    ]])
    ]);
    }
    }
   ?> 