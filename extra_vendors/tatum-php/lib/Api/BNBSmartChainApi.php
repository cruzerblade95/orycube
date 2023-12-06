<?php

/**
 * Implementation of BNBSmartChain API
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
 * API for BNBSmartChain
 */
class BNBSmartChainApi extends AbstractApi {
    
    /**
     * API package
     */
    const PKG = "BNB Smart Chain";

    /**
     * Broadcast signed BSC transaction
     *
     * @param \Tatum\Model\BroadcastKMS $broadcast_kms 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionHash
     */
    public function bscBroadcast($broadcast_kms) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/bsc/broadcast";
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
     * Generate BSC account address from Extended public key
     *
     * @param string $xpub Extended public key of wallet.
     * @param float $index Derivation index of desired address to be generated.
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\GeneratedAddressBsc
     */
    public function bscGenerateAddress($xpub, $index) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/bsc/address/{xpub}/{index}";
        /** @var \Tatum\Model\GeneratedAddressBsc $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["xpub" => $xpub, "index" => $index]), $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\GeneratedAddressBsc"
        );
            
        return $result;
    }
    
    /**
     * Generate BSC private key
     *
     * @param \Tatum\Model\PrivKeyRequest $priv_key_request 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\PrivKey
     */
    public function bscGenerateAddressPrivateKey($priv_key_request) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/bsc/wallet/priv";
        /** @var \Tatum\Model\PrivKey $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $priv_key_request
            ), 
            "\Tatum\Model\PrivKey"
        );
            
        return $result;
    }
    
    /**
     * Generate BSC wallet
     *
     * @param string|null $mnemonic Mnemonic to use for generation of extended public and private keys.
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\Wallet
     */
    public function bscGenerateWallet($mnemonic = null) {
        if (isset($mnemonic) && strlen($mnemonic) > 500) {
            throw new IAE('Invalid length for "$mnemonic" when calling BNBSmartChainApi.bscGenerateWallet, must be smaller than or equal to 500');
        }

        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/bsc/wallet";
        /** @var \Tatum\Model\Wallet $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", $rPath, $rPath, [
                    "mnemonic" => isset($mnemonic) ? S::toQueryValue($mnemonic) : null,
                ], $rHeaders, []
            ), 
            "\Tatum\Model\Wallet"
        );
            
        return $result;
    }
    
    /**
     * Get BSC Account balance
     *
     * @param string $address Account address you want to get balance of
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\BscBalance
     */
    public function bscGetBalance($address) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/bsc/account/balance/{address}";
        /** @var \Tatum\Model\BscBalance $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["address" => $address]), $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\BscBalance"
        );
            
        return $result;
    }
    
    /**
     * Get BSC block by hash
     *
     * @param string $hash Block hash or block number
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\EthBlock
     */
    public function bscGetBlock($hash) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/bsc/block/{hash}";
        /** @var \Tatum\Model\EthBlock $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["hash" => $hash]), $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\EthBlock"
        );
            
        return $result;
    }
    
    /**
     * Get current block number
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return float
     */
    public function bscGetCurrentBlock() {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/bsc/block/current";
        /** @var float $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", $rPath, $rPath, [], $rHeaders, []
            ), 
            "float"
        );
            
        return $result;
    }
    
    /**
     * Get BSC Transaction
     *
     * @param string $hash Transaction hash
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\BscTx
     */
    public function bscGetTransaction($hash) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/bsc/transaction/{hash}";
        /** @var \Tatum\Model\BscTx $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["hash" => $hash]), $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\BscTx"
        );
            
        return $result;
    }
    
    /**
     * Get count of outgoing BSC transactions
     *
     * @param string $address address
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return float
     */
    public function bscGetTransactionCount($address) {
        if (strlen($address) > 42) {
            throw new IAE('Invalid length for "$address" when calling BNBSmartChainApi.bscGetTransactionCount, must be smaller than or equal to 42');
        }

        if (strlen($address) < 42) {
            throw new IAE('Invalid length for "$address" when calling BNBSmartChainApi.bscGetTransactionCount, must be bigger than or equal to 42');
        }

        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/bsc/transaction/count/{address}";
        /** @var float $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["address" => $address]), $rPath, [], $rHeaders, []
            ), 
            "float"
        );
            
        return $result;
    }
    
    /**
     * Invoke a method in a smart contract on BNB Smart Chain
     *
     * @param \Tatum\Model\CallBscSmartContractMethod $call_bsc_smart_contract_method 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\CallSmartContractMethod200Response
     */
    public function callBscSmartContractMethod($call_bsc_smart_contract_method) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/bsc/smartcontract";
        /** @var \Tatum\Model\CallSmartContractMethod200Response $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $call_bsc_smart_contract_method
            ), 
            "\Tatum\Model\CallSmartContractMethod200Response"
        );
            
        return $result;
    }
    
    /**
     * Invoke a method in a smart contract on BNB Smart Chain
     *
     * @param \Tatum\Model\CallBscSmartContractMethodKMS $call_bsc_smart_contract_method_kms 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\CallSmartContractMethod200Response
     */
    public function callBscSmartContractMethodKMS($call_bsc_smart_contract_method_kms) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/bsc/smartcontract";
        /** @var \Tatum\Model\CallSmartContractMethod200Response $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $call_bsc_smart_contract_method_kms
            ), 
            "\Tatum\Model\CallSmartContractMethod200Response"
        );
            
        return $result;
    }
    
    /**
     * Invoke a method in a smart contract on BNB Smart Chain
     *
     * @param \Tatum\Model\CallBscSmartContractReadMethod $call_bsc_smart_contract_read_method 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\CallSmartContractMethod200Response
     */
    public function callBscSmartContractReadMethod($call_bsc_smart_contract_read_method) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/bsc/smartcontract";
        /** @var \Tatum\Model\CallSmartContractMethod200Response $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $call_bsc_smart_contract_read_method
            ), 
            "\Tatum\Model\CallSmartContractMethod200Response"
        );
            
        return $result;
    }
    
    /**
     * Send BSC / BEP20 from account to account
     *
     * @param \Tatum\Model\TransferBscBlockchain $transfer_bsc_blockchain 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function transferBscBlockchain($transfer_bsc_blockchain) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/bsc/transaction";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $transfer_bsc_blockchain
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
    /**
     * Send BSC / BEP20 from account to account
     *
     * @param \Tatum\Model\TransferBscBlockchainKMS $transfer_bsc_blockchain_kms 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function transferBscBlockchainKMS($transfer_bsc_blockchain_kms) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/bsc/transaction";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $transfer_bsc_blockchain_kms
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
}