<?php

namespace Crmp\Domain;

use Crmp\Domain\Traits\Tree;

/**
 * Inquiry
 *
 * @package Crmp\Domain
 */
class Inquiry {
	/**
	 * Description of the inquiry.
	 *
	 * @var string
	 */
	protected $content;
	/**
	 * Title of the inquiry.
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * Create new inquiry.
	 *
	 * @param int    $id      Identifier.
	 * @param string $title   Subject.
	 * @param string $content Description.
	 */
	public function __construct( $id, $title, $content ) {
		$this->id      = $id;
		$this->title   = $title;
		$this->content = $content;
	}

	/**
	 * Description.
	 *
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Receive title.
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}
}
