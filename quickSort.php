<?php
	//快速排序算法，快速排序函数。
	// 基本思想是：通过一趟排序将要排序的数据分割成独立的两部分，其中一部分的所有数据都比另外一部分的所有数据都要小，然后再按此方法对这两部分数据分别进行快速排序，整个排序过程可以递归进行，以此达到整个数据变成有序序列。
	ini_set('memory_limit', '2024M');
	function quicksort($arr){
		if (count($arr)<=1) {
			return $arr;
		}else{
			$left_array 	=array();
			$right_array 	=array();
			// 标准比较值
			$base_num = $arr[0];

				for($i=1;$i<count($arr);$i++){
					if($arr[$i]<$base_num){
						//放入左边数组
						$left_array[] = $arr[$i];
					}else{
						//放入右边数组
						$right_array[]= $arr[$i];
					}
				}//end for
				
			}//end else
			/*
				对左右两边的数组进行相同的处理
				递归调用这个函数，并记录结果
			*/
			$left_array  = quicksort($left_array);
			$right_array = quicksort($right_array);
			//合并左数组，基准数组，右边数组
			return array_merge($left_array,array($base_num),$right_array);		 
	}//end quicksort

	//构造一个500w的数据
    $numArr[] = array();
	for ($i=0; $i <500000; $i++) { 
	 	$numArr[] = $i;
	}
	shuffle($numArr);//shuffle — 打乱数组
	$timefirst = time();
	var_dump(array_slice(quicksort($numArr),0,10));
	$timelast = time();
	echo $timelast-$timefirst;
