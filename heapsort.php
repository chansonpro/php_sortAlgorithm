<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2017-05-06 20:54:08
 * @version 大顶堆
 */
	ini_set('memory_limit', '2024M');
	function heapsort(&$arr){
		// 建立堆
		buildheapsort($arr);
		$len  = count($arr);
		$node = floor($len/2) - 1;
		while ($len>1) {
			swap($arr,$len-1,0);
			$len--;//去掉最后一个元素后，进行重新调整，所以长度也会每次减少一个
			adjustheapsort($arr,$len,0);//???
		}
	}//end heapsort
	/*
	建堆函数,堆的初始化
	*/
	function buildheapsort(&$arr){
		$node = floor(count($arr)/2)-1;//最大非叶子节点的坐标
		for ($i=$node; $i>=0;$i--) {

			adjustheapsort($arr,count($arr),$i);//???
		}

	}//end buildheap
	/*
	堆的序列调整函数
	*/
	//$maxlen是当前需要调整的下标最大值，或者成为arr的长度,$node是需要调整的非叶子节点
	function adjustheapsort(&$arr,$maxlen,$node){
		$leftChildNode  = $node * 2 + 1;//左孩子点
		$rightChildNode = $node * 2 + 2;//右孩子点
		$max = $node;
		//如果待调整部分有左孩子
		if ($leftChildNode +1 <=$maxlen) {
			//获的最小节点坐标
			if ($arr[$leftChildNode]>$arr[$max]) {
				$max = $leftChildNode;
			}
		}
		//如果待调整部分有右孩子
		if ($rightChildNode +1 <=$maxlen) {
			if ($arr[$rightChildNode]>$arr[$max]) {
				$max = $rightChildNode;
			}
		}
		//$max确定之后，判断max是否就是当前node对应的值，如果是，不需要调换，不是的话，需要swap
			if ($max != $node) {
				swap($arr,$max,$node);
				//如果交换后的子节点还有子节点,继续调整
				if (($max+1)*2 < $maxlen) {
					adjustheapsort($arr,$maxlen,$max);
				}
			}
	}//end adjustheapsort
	/*
	交换变量值
	*/
	function swap(&$arr,$m,$n){
		$arr[$m] = $arr[$m] ^ $arr[$n];
		$arr[$n] = $arr[$m] ^ $arr[$n];
		$arr[$m] = $arr[$m] ^ $arr[$n];
	}//end swap

	// for($i=0;$i<50000;$i++){
	//     $numArr[] = $i;    
	// }
	// //打乱它们
	// shuffle($numArr);
	// //var_dump($numArr);
	// $timefirst = time();
	// heapsort($numArr);
	// //先取出10个到数组
	// var_dump(array_slice($numArr,0,10));
	// //var_dump($numArr);
	// $timelast = time();
	// echo $timelast-$timefirst;
	$arr = [49, 38, 65, 97, 76, 13, 27, 50];
	heapsort($arr);
	var_dump($arr);