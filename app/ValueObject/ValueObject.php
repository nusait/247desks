<?php namespace ServiceDesk\ValueObject;

use BadMethodCallException;

abstract class ValueObject {

	public function __get($name) {
		$methodName = 'get' . ucfirst($name);
		if (method_exists($this, $methodName)) {
			return $this->$methodName();
		}
		throw new BadMethodCallException('There is no method called ' . $methodName);
	}

	abstract function __toString();

	protected function getName() {
		$reflection = new \ReflectionClass($this);
		$shortName = $reflection->getShortName();
		return strtolower(snake_case($shortName));
	}

	public function getValidationError() {
		if (is_null($this->validator)) {
			$this->validate();
		}

		if ($this->validator->passes()) {
			return null;
		}

		return $this->validator->messages();
	}
}