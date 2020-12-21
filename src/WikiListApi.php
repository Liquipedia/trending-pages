<?php

namespace Liquipedia\TrendingMenu;

use ApiBase;

class WikiListApi extends ApiBase {

	/**
	 *
	 */
	public function execute() {
		$data = $this->getRequest()->getText( 'data' );
		if ( $data === 'list' ) {
			$out = Helper::getWikiList();
		} elseif ( $data === 'hot' ) {
			$out = Helper::getWikiHotList();
		} else {
			$out = [ 'error' => $this->msg( 'wikilist-invalid-value' )->text() ];
		}
		$this->getResult()->addValue( null, $this->getModuleName(), $out );
	}

	/**
	 * @return mixed
	 */
	public function getDescription() {
		return $this->msg( 'wikilist-shortdesc' )->text();
	}

	/**
	 * @return mixed
	 */
	public function getParamDescription() {
		return parent::getParamDescription();
	}

	/**
	 * @return array
	 */
	public function getExamplesMessages() {
		return [
			'action=wikilist&data=list' => 'wikilist-example',
		];
	}

	/**
	 * @return array
	 */
	public function getAllowedParams() {
		return [
			'data' => [
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_HELP_MSG => 'wikilist-data',
				ApiBase::PARAM_REQUIRED => true,
			]
		];
	}

}
