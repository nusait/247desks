<?php namespace ServiceDesk\ValueObject;

use Illuminate\Support\Str;

class PhoneNumber extends ValueObject {
	protected $origValue;
	protected $number;
	protected $areaCode;
	protected $subAreaCode;
	protected $bodyCode;

	function __construct($value) {
		$this->origValue = $value;
		$this->number = $this->normalizeNumber($value);
		$this->parseNumber($this->number);
	}

	protected function normalizeNumber($value) {
		$numOnly = preg_replace("/[^0-9]/", "", (string) $value);
		if (strlen($numOnly) === 11 and Str::startsWith($numOnly, '1')) {
			return substr($numOnly, 1);
		}
		return $numOnly;
	}
	protected function parseNumber($num) {
		$this->areaCode = substr($num, 0, 3);
		$this->subAreaCode = substr($num, 3, 3);
		$this->bodyCode = substr($num, -4, 4);
	}

	public function humanReadable() {
		$area = $this->areaCode;
		$sub = $this->subAreaCode;
		$body = $this->bodyCode;
		return "($area) $sub-$body";
	}

	public function __toString() {
		return (string) $this->number;
	}
}