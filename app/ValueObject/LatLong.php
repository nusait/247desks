<?php namespace ServiceDesk\ValueObject;

class LatLong extends ValueObject {
	protected $lat;
	protected $long;

	function __construct($lat, $long) {
		$this->lat = floatval($lat);
		$this->long = floatval($long);
		if (is_null($lat) or is_null($long)) {
			$this->lat = null;
			$this->long = null;
		}
	}

	function getLat() {
		return $this->lat;
	}

	function getLong() {
		return $this->long;
	}

	public function __toString() {
		if (is_null($this->lat) or is_null($this->long)) {
			return null;
		}
		return $this->lat . ',' . $this->long;
	}
}