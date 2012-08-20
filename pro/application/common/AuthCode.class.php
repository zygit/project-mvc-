<?php
class AuthCode{

	private  $width;     //验证码宽度
	private  $height;    //验证码高度
	private  $codenum;   //验证码字符个数
	private  $codecontent = "012345689QWERTYUPASDFGHJKXCVBNM";//验证码字符内容
	private  $checkimage; //验证码图片
	private  $disturbcolor = '';//干扰像素
	private  $noisepoint = 100;//点干扰数量
	private  $noiseline = 8;//点干扰数量
	private  $font = './fonts/simhei.ttf';//字体，只有选中倾斜的时候 即$isoblique = true的时候有用
	private  $ispoint = true;//是否显示点干扰
	private  $isline = true;//是否显示线干扰
	private  $isoblique = false;//字符是否倾斜
	private  $isborder = true;//是否需要边框
	private  $authcode;  //产生的验证码


	//初始化
	function __construct($width=75, $height=22, $codenum=4){

		$this->width=$width;
		$this->height=$height;
		$this->codenum=$codenum;
		$this->createCode();//产生验证码
	}
	
	public function outPutImg(){

		$this->outFileHeader();//输出头
		$this->createImage();//产生图片
		$this->setDisturbColor();//设置干扰像素
		$this->writeCheckCodeToImage();//往图片上写验证码
		$this->createValidate();//生成验证码图片
	}

	//生成验证码
	public  function createCode(){

		for ($i = 0; $i < $this->codenum; $i++) {
			$this->authcode .= $this->codecontent{rand(0, strlen($this->codecontent) - 1)};
		}
	}

	//头图片类型
	public  function outFileHeader(){
		
		Header("Content-type:image/png");
	}

	//产生图片
	public function createImage(){

		$this->checkimage = @imagecreate($this->width,$this->height);
		$back = imagecolorallocate($this->checkimage, 255 , 255 , 255 );
		if($this->isborder){
			$border = imagecolorallocate($this->checkimage,0,0,0);
		}else{
			$border = imagecolorallocate($this->checkimage,255,255,255);
		}
		imagefilledrectangle($this->checkimage,0,0,$this->width - 1,$this->height - 1,$back); // 白色底
		imagerectangle($this->checkimage,0,0,$this->width - 1,$this->height - 1,$border);   // 黑色边框
	}

	//设置干扰因素
	public function setDisturbColor(){

		if($this->ispoint){
			$this->createNoisePoint();//设置点干扰
		}
		if($this->isline){
			$this->createNoiseLine();//设置线干扰
		}
	}

	//设置点干扰
	public function createNoisePoint(){
		
		for ($i = 0; $i <= $this->noisepoint; $i++){
			$this->disturbcolor = imagecolorallocate($this->checkimage, rand(0,255), rand(0,255), rand(0,255));
			imagesetpixel($this->checkimage,rand(2,128),rand(2,38),$this->disturbcolor);
		}
	}

	//设置弧线干扰
	public function createNoiseLine(){

		for ($i = 0; $i <= $this->noiseline; $i++) {
			$color = imagecolorallocate($this->checkimage, rand(128, 255), rand(125, 255), rand(100, 255));
			imagearc($this->checkimage, rand(0, $this->width), rand(0, $this->height), rand(30, 300), rand(20, 200), 50, 30, $color);
		}
	}

	//验证码写入图片
	public function writeCheckCodeToImage(){

		for ($i=0;$i<=$this->codenum;$i++){
			$bg_color = imagecolorallocate ($this->checkimage, rand(0,255) , rand(0,255) , rand(0,255));
			$size = rand(floor($this->height / 5), floor($this->height / 3));
			$x = (5+floor($this->width/$this->codenum)*$i);
			if($this->isoblique){
				$y = rand(floor($this->height/2)+5, floor($this->height/2)+5);
				imagettftext($this->checkimage, rand(11, 14), rand(-15,15), $x, $y, $bg_color, $this->font, $this->authcode[$i]);
			}else{
				$y = ($this->height/2 - rand(3,10));
				imagechar($this->checkimage, rand(4,5), $x, $y, $this->authcode[$i], $bg_color);
			}
		}
	}

	//生成验证码图片
	public  function createValidate(){

		imagepng($this->checkimage);
		imagedestroy($this->checkimage);
	}

	//获得验证码
	public function getCode(){

		return $this->authcode;
	}

	function __destruct(){

		unset($this->width,$this->height,$this->codenum);
	}
}

	$view = new AuthCode( );
	echo $view->outPutImg();

?>
