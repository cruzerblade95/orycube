<?php

/**
 * Implementation of XRP API
 *
 * @copyright (c) 2022-2023 tatum.io
 * @license   MIT
 * @package   Tatum
 * @author    Mark Jivko
 *
 * NOTE: This class is auto-generated by tatum.io
 * Do not edit this file manually!
 */

namespace Tatum\Api;
!defined("TATUM-SDK") && exit();

use InvalidArgumentException as IAE;
use Tatum\Sdk\Serializer as S;

/**
 * API for XRP
 */
class XRPApi extends AbstractApi {
    
    /**
     * API package
     */
    const PKG = "XRP";

    /**
     * Modify XRP account
     *
     * @param \Tatum\Model\AccountSettingsXrpBlockchain $account_settings_xrp_blockchain 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function accountSettingsXrpBlockchain($account_settings_xrp_blockchain) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/xrp/account/settings";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $account_settings_xrp_blockchain
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
    /**
     * Modify XRP account
     *
     * @param \Tatum\Model\AccountSettingsXrpBlockchainKMS $account_settings_xrp_blockchain_kms 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function accountSettingsXrpBlockchainKMS($account_settings_xrp_blockchain_kms) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/xrp/account/settings";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $account_settings_xrp_blockchain_kms
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
    /**
     * Send XRP from address to address
     *
     * @param \Tatum\Model\TransferXrpBlockchain $transfer_xrp_blockchain 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function transferXrpBlockchain($transfer_xrp_blockchain) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/xrp/transaction";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $transfer_xrp_blockchain
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
    /**
     * Send XRP from address to address
     *
     * @param \Tatum\Model\TransferXrpBlockchainAsset $transfer_xrp_blockchain_asset 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function transferXrpBlockchainAsset($transfer_xrp_blockchain_asset) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/xrp/transaction";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $transfer_xrp_blockchain_asset
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
    /**
     * Send XRP from address to address
     *
     * @param \Tatum\Model\TransferXrpBlockchainAssetKMS $transfer_xrp_blockchain_asset_kms 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function transferXrpBlockchainAssetKMS($transfer_xrp_blockchain_asset_kms) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/xrp/transaction";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $transfer_xrp_blockchain_asset_kms
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
    /**
     * Send XRP from address to address
     *
     * @param \Tatum\Model\TransferXrpBlockchainKMS $transfer_xrp_blockchain_kms 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function transferXrpBlockchainKMS($transfer_xrp_blockchain_kms) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/xrp/transaction";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $transfer_xrp_blockchain_kms
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
    /**
     * Create / Update / Delete XRP trust line
     *
     * @param \Tatum\Model\TrustLineXrpBlockchain $trust_line_xrp_blockchain 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function trustLineXrpBlockchain($trust_line_xrp_blockchain) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/xrp/trust";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $trust_line_xrp_blockchain
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
    /**
     * Create / Update / Delete XRP trust line
     *
     * @param \Tatum\Model\TrustLineXrpBlockchainKMS $trust_line_xrp_blockchain_kms 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function trustLineXrpBlockchainKMS($trust_line_xrp_blockchain_kms) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/xrp/trust";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $trust_line_xrp_blockchain_kms
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
    /**
     * Broadcast signed XRP transaction
     *
     * @param \Tatum\Model\BroadcastKMS $broadcast_kms 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionHash
     */
    public function xrpBroadcast($broadcast_kms) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/xrp/broadcast";
        /** @var \Tatum\Model\TransactionHash $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $broadcast_kms
            ), 
            "\Tatum\Model\TransactionHash"
        );
            
        return $result;
    }
    
    /**
     * Get Account Balance
     *
     * @param string $account Account address you want to get balance of
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\XrpAccountBalance
     */
    public function xrpGetAccountBalance($account) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/xrp/account/{account}/balance";
        /** @var \Tatum\Model\XrpAccountBalance $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["account" => $account]), $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\XrpAccountBalance"
        );
            
        return $result;
    }
    
    /**
     * Get Account info
     *
     * @param string $account Account address you want to get balance of
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\XrpAccount
     */
    public function xrpGetAccountInfo($account) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/xrp/account/{account}";
        /** @var \Tatum\Model\XrpAccount $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["account" => $account]), $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\XrpAccount"
        );
            
        return $result;
    }
    
    /**
     * Get Account transactions
     *
     * @param string $account Address of XRP account.
     * @param float|null $min Ledger version to start scanning for transactions from.
     * @param string|null $marker Marker from the last paginated request. It is stringified JSON from previous response.
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\XrpAccountTx
     */
    public function xrpGetAccountTx($account, $min = null, $marker = null) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/xrp/account/tx/{account}";
        /** @var \Tatum\Model\XrpAccountTx $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["account" => $account]), $rPath, [
                    "min" => isset($min) ? S::toQueryValue($min) : null,
                    "marker" => isset($marker) ? S::toQueryValue($marker) : null,
                ], $rHeaders, []
            ), 
            "\Tatum\Model\XrpAccountTx"
        );
            
        return $result;
    }
    
    /**
     * Get actual Blockchain fee
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\XrpFee
     */
    public function xrpGetFee() {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/xrp/fee";
        /** @var \Tatum\Model\XrpFee $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", $rPath, $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\XrpFee"
        );
            
        return $result;
    }
    
    /**
     * Get XRP Blockchain Information
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\XrpInfo
     */
    public function xrpGetLastClosedLedger() {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/xrp/info";
        /** @var \Tatum\Model\XrpInfo $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", $rPath, $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\XrpInfo"
        );
            
        return $result;
    }
    
    /**
     * Get Ledger
     *
     * @param float $i Sequence of XRP ledger.
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\XrpLedger
     */
    public function xrpGetLedger($i) {
        if ($i < 0) {
            throw new IAE('Invalid value for "$i" when calling XRPApi.xrpGetLedger, must be bigger than or equal to 0.');
        }

        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/xrp/ledger/{i}";
        /** @var \Tatum\Model\XrpLedger $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["i" => $i]), $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\XrpLedger"
        );
            
        return $result;
    }
    
    /**
     * Get XRP Transaction by hash
     *
     * @param string $hash Transaction hash
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\XrpTx
     */
    public function xrpGetTransaction($hash) {
        if (strlen($hash) > 64) {
            throw new IAE('Invalid length for "$hash" when calling XRPApi.xrpGetTransaction, must be smaller than or equal to 64');
        }

        if (strlen($hash) < 64) {
            throw new IAE('Invalid length for "$hash" when calling XRPApi.xrpGetTransaction, must be bigger than or equal to 64');
        }

        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/xrp/transaction/{hash}";
        /** @var \Tatum\Model\XrpTx $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["hash" => $hash]), $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\XrpTx"
        );
            
        return $result;
    }
    
    /**
     * Generate XRP account
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\XrpWallet
     */
    public function xrpWallet() {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/xrp/account";
        /** @var \Tatum\Model\XrpWallet $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", $rPath, $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\XrpWallet"
        );
            
        return $result;
    }
    
}
